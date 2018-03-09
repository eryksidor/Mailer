<?php
/**
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Services;

use CodeLab\Bundle\MailerBundle\Entity\MailingHistory;
use CodeLab\Bundle\MailerBundle\Message\InvalidMessageException;
use CodeLab\Bundle\MailerBundle\Message\MailerMessage;
use CodeLab\Bundle\MailerBundle\SpoolTypes\Types\CronSpool;
use CodeLab\Bundle\MailerBundle\SpoolTypes\Types\DefaultSpool;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class MailerService
 *
 */
final class MailerService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var \Swift_Mailer
     */
    private $defaultMailer;

    /**
     * @var \Swift_Mailer
     */
    private $cronMailer;

    /**
     * @var \Swift_Transport
     */
    private $cronMailerTransport;

    /**
     * @var integer
     */
    private $resentInterval;

    /**
     * MailerService constructor.
     * @param EntityManagerInterface $entityManager
     * @param \Swift_Mailer $defaultMailer
     * @param \Swift_Mailer $cronMailer
     */
    public function __construct(EntityManagerInterface $entityManager, \Swift_Mailer $defaultMailer, \Swift_Mailer $cronMailer, \Swift_Transport $cronMailerTransport, $resendInterval)
    {
        $this->em = $entityManager;
        $this->defaultMailer = $defaultMailer;
        $this->cronMailer = $cronMailer;
        $this->cronMailerTransport = $cronMailerTransport;
        $this->resentInterval = $resendInterval;
    }

    /**
     * @param MailerMessage $mailerMessage
     * @return MailerMessage
     */
    public function send(MailerMessage $mailerMessage): MailerMessage
    {
        if (!$mailerMessage instanceof MailerMessage) {
            throw new InvalidMessageException();
        }

        $mailerMessage = self::spoolEmail($mailerMessage);

        $spool = $mailerMessage->getSpool();

        if ($spool instanceof DefaultSpool) {
            $result = $this->defaultMailer->send($mailerMessage);
        }

        return $mailerMessage;
    }

    /**
     * Saving message to database spool or message to session for sending after kernel terminate
     *
     * @param MailerMessage $message
     * @return MailerMessage
     */
    private function spoolEmail(MailerMessage $message): MailerMessage
    {
        $mailingHistory = new MailingHistory();

        $mailingHistory->setFrom($message->getFrom());
        $mailingHistory->setBody($message->getBody());
        $mailingHistory->setCharset($message->getCharset());
        $mailingHistory->setContentType($message->getContentType());
        $mailingHistory->setTo($message->getTo());
        $mailingHistory->setBoundary($message->getBoundary());
        $mailingHistory->setPriority($message->getPriority());
        $mailingHistory->setReplyTo($message->getReplyTo());
        $mailingHistory->setReturnPath($message->getReturnPath());
        $mailingHistory->setSender($message->getSender());
        $mailingHistory->setSpoolType($message->getSpool()->getName());
        $mailingHistory->setSubject($message->getSubject());
        $mailingHistory->setSwiftMessageId($message->getId());

        if ($message->getSendAd()) {
            $mailingHistory->setSendAt($message->getSendAd());
        }

        if ($message->getBcc()) {
            $mailingHistory->setBcc($message->getBcc());
        }

        if ($message->getCc()) {
            $mailingHistory->setCc($message->getCc());
        }

        if ($message->hasErrors()) {
            $mailingHistory->setErrors($message->getErrorsArray());
            $mailingHistory->setState(MailingHistory::MESSAGE_STATE_FAILED);
        }

        if ($message->getReadReceiptTo()) {
            $mailingHistory->setReadReceiptTo($message->getReadReceiptTo());
        }

        $this->em->persist($mailingHistory);
        $this->em->flush();

        $message->setMailingHistory($mailingHistory);

        return $message;
    }

    public function sendCronEmails()
    {
        $messages = self::getMessagesForCronSend();
        if (!empty($messages)) {
            foreach ($messages as $oneMessage) {
                $mailerMessage = self::prepareMailerMessageFromHistory($oneMessage);

                /**
                 * Finally send message to cron spool
                 */
                $this->cronMailer->send($mailerMessage);
            }
        }
    }

    private function getMessagesForCronSend()
    {
        return $messages = $this->em->getRepository(MailingHistory::class)->getMessagesForCronSpoolSend($this->resentInterval);
    }

    /**
     * @param MailingHistory $message
     * @return MailerMessage
     */
    private function prepareMailerMessageFromHistory(MailingHistory $message)
    {
        $mailerMessage = new MailerMessage(new CronSpool());

        /*
         * update swiftmessageid in mailing history
         */
        $message->setSwiftMessageId($mailerMessage->getId());
        $message->setState(MailingHistory::MESSAGE_STATE_IN_PROGRESS);

        /**
         * recover message from database
         */
        $mailerMessage->setSubject($message->getSubject());
        $mailerMessage->setSender($message->getSender());
        $mailerMessage->setReturnPath($message->getReturnPath());
        $mailerMessage->setReplyTo($message->getReplyTo());
        $mailerMessage->setReadReceiptTo($message->getReadReceiptTo());
        $mailerMessage->setPriority($message->getPriority());
        $mailerMessage->setContentType($message->getContentType());
        $mailerMessage->setCharset($message->getCharset());
        $mailerMessage->setCc($message->getCc());
        $mailerMessage->setBoundary($message->getBoundary());
        $mailerMessage->setBcc($message->getBcc());
        $mailerMessage->setTo($message->getMailTo());
        $mailerMessage->setBody($message->getBody());
        $mailerMessage->setFrom($message->getMailFrom());

        $this->em->persist($message);
        $this->em->flush();

        return $mailerMessage;
    }

    public function flushCronSpool()
    {
        $transport = $this->cronMailer->getTransport();

        if (!$transport instanceof \Swift_Transport_SpoolTransport) {
            return;
        }

        $transport->registerPlugin(new \Swift_Plugins_AntiFloodPlugin(100));

        $spool = $transport->getSpool();

        if (!$spool instanceof \Swift_FileSpool) {
            return;
        }

        $spool->flushQueue($this->cronMailerTransport);
    }


}