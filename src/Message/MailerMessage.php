<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Message;

use CodeLab\Bundle\MailerBundle\Entity\MailingHistory;
use CodeLab\Bundle\MailerBundle\Services\MailerService;
use CodeLab\Bundle\MailerBundle\SpoolTypes\SpoolInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class MailerMessage
 * Description of MailerMessage. This is main class for creating and sending emails.
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
final class MailerMessage extends AbstractMessageBuilder
{

    /**
     * @var SpoolInterface
     */
    private $spool;

    /**
     * @var MailingHistory
     */
    private $mailingHistory = false;

    /**
     * @var \DateTime
     */
    private $sendAd;

    /**
     * MailerMessage constructor.
     * @param SpoolInterface $spool
     * @param null|string $subject
     * @param null|string $body
     * @param null|string $contentType
     * @param null|string $charset
     */
    public function __construct(SpoolInterface $spool, ?string $subject = null, ?string $body = null, ?string $contentType = null, ?string $charset = null)
    {
        $this->spool = $spool;
        parent::__construct($subject, $body, $contentType, $charset);
    }

    /**
     * @return MailingHistory
     */
    public function getMailingHistory()
    {
        return $this->mailingHistory;
    }

    /**
     * @param MailingHistory $mailingHistory
     */
    public function setMailingHistory(MailingHistory $mailingHistory)
    {
        $this->mailingHistory = $mailingHistory;
    }

    /**
     * @return \DateTime
     */
    public function getSendAd(): ? \DateTime
    {
        return $this->sendAd;
    }

    /**
     * @param \DateTime $sendAd
     */
    public function setSendAd(\DateTime $sendAd): void
    {
        $this->sendAd = $sendAd;
    }

    /**
     * @return SpoolInterface
     */
    public function getSpool(){
        return $this->spool;
    }

}