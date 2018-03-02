<?php
/**
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Services;

use CodeLab\Bundle\MailerBundle\Entity\MailingHistory;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class TransportLoggerService
 *
 */
final class TransportLoggerService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * TransportLoggerService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function updateMailingHistory(\Swift_Events_SendEvent $event)
    {

        /**
         * get Message entry from db
         */
        $message = $event->getMessage();
        $messageResult = self::getMailingReadableResult($event);
        if ($messageResult !== MailingHistory::MESSAGE_STATE_PLANNED) {
            $mailingHistory = $this->em->getRepository(MailingHistory::class)->findOneBy(array(
                'swiftMessageId' => $message->getId()
            ));

            if ($mailingHistory) {
                if ($messageResult == MailingHistory::MESSAGE_STATE_FAILED) {
                    $mailingHistory->addError($event->getFailedRecipients());
                    $mailingHistory->setState(MailingHistory::MESSAGE_STATE_FAILED);
                } else if ($messageResult == MailingHistory::MESSAGE_STATE_SENT) {
                    $mailingHistory->setState($messageResult);
                    $mailingHistory->setSentAt(new \DateTime());
                }
                $mailingHistory->setSendAttempts($mailingHistory->getSendAttempts() + 1);
                $this->em->persist($mailingHistory);
                $this->em->flush();
            }
        }

    }

    /**
     * @param \Swift_Events_SendEvent $evt
     * @return string
     */
    private function getMailingReadableResult(\Swift_Events_SendEvent $evt)
    {
        $result = $evt->getResult();

        if ($result === 16) {
            return MailingHistory::MESSAGE_STATE_SENT;
        }
        if ($result === 17) {
            return MailingHistory::MESSAGE_STATE_PLANNED;
        }
        if ($result === 4096) {
            return MailingHistory::MESSAGE_STATE_FAILED;
        }
        return 'unknown';
    }

}