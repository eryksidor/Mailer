<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Entity;

use CodeLab\Bundle\MailerBundle\Message\AbstractMessageBuilder;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MailingHistory
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 *
 * @ORM\Entity(repositoryClass="CodeLab\Bundle\MailerBundle\Repository\MailingHistoryRepository")
 */
class MailingHistory
{

    CONST MESSAGE_STATE_PLANNED = 'PLANNED';
    CONST MESSAGE_STATE_IN_PROGRESS = 'IN_PROGRESS';
    CONST MESSAGE_STATE_SENT = 'SENT';
    CONST MESSAGE_STATE_FAILED = 'FAILED';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sendAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sentAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $spoolType;

    /**
     * @ORM\Column(type="integer")
     */
    private $priority;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sendAttempts;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $errors;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sender;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mailFrom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mailTo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $subject;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $charset;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contentType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $swiftMessageId;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bcc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $replyTo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $returnPath;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $readReceiptTo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boundary;


    public function __construct()
    {
        $this->sendAttempts = 0;
        $this->state = self::MESSAGE_STATE_PLANNED;
        $this->creationTime = new \DateTime();
        $this->priority = AbstractMessageBuilder::PRIORITY_NORMAL;
        
        /**
         * @TODO need beeter hash
         */
        $this->hash = md5(time());
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreationTime(): \DateTime
    {
        return $this->creationTime;
    }

    /**
     * @param \DateTime $creationTime
     */
    public function setCreationTime(\DateTime $creationTime): void
    {
        $this->creationTime = $creationTime;
    }

    /**
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @param mixed $updateTime
     */
    public function setUpdateTime($updateTime): void
    {
        $this->updateTime = $updateTime;
    }


    /**
     * @return \DateTime
     */
    public function getSendAt(): \DateTime
    {
        return $this->sendAt;
    }

    /**
     * @param \DateTime $sendAt
     */
    public function setSendAt(\DateTime $sendAt): void
    {
        $this->sendAt = $sendAt;
    }

    /**
     * @return \DateTime
     */
    public function getSentAt(): \DateTime
    {
        return $this->sentAt;
    }

    /**
     * @param \DateTime $sentAt
     */
    public function setSentAt(\DateTime $sentAt): void
    {
        $this->sentAt = $sentAt;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getSpoolType(): string
    {
        return $this->spoolType;
    }

    /**
     * @param string $spoolType
     */
    public function setSpoolType(string $spoolType): void
    {
        $this->spoolType = $spoolType;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getSendAttempts(): int
    {
        return $this->sendAttempts;
    }

    /**
     * @param int $sendAttempts
     */
    public function setSendAttempts(int $sendAttempts): void
    {
        $this->sendAttempts = $sendAttempts;
    }

    /**
     * @return string
     */
    public function getErrors(): array
    {
        return json_decode($this->errors, true);
    }

    /**
     * @param $errors
     */
    public function setErrors($errors): void
    {
        $this->errors = json_encode($errors);
    }

    /**
     * @param $error
     */
    public function addError($error)
    {
        $errors = $this->getErrors();
        $errors[] = $error;
        self::setErrors($errors);
    }

    /**
     * @return string
     */
    public function getSender(): ? string
    {
        return json_decode($this->sender, true);
    }

    /**
     * @param $sender
     */
    public function setSender($sender): void
    {
        $this->sender = json_encode($sender);
    }


    public function getMailFrom(): ? array
    {
        return json_decode($this->mailFrom, true);
    }

    /**
     * @param $from
     */
    public function setFrom($from): void
    {
        $this->mailFrom = json_encode($from);
    }

    /**
     * @return array|null
     */
    public function getMailTo(): ? array
    {
        return json_decode($this->mailTo, true);
    }

    /**
     * @param $to
     */
    public function setTo($to): void
    {
        $this->mailTo = json_encode($to);
    }

    /**
     * @return string
     */
    public function getSubject(): ? string
    {
        return $this->subject;
    }

    /**
     * @param $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody(): ? string
    {
        return $this->body;
    }

    /**
     * @param  $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getCharset(): ? string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset): void
    {
        $this->charset = $charset;
    }

    /**
     * @return string
     */
    public function getContentType(): ? string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    public function getSwiftMessageId(): string
    {
        return $this->swiftMessageId;
    }

    /**
     * @param string $swiftMessageId
     */
    public function setSwiftMessageId(string $swiftMessageId): void
    {
        $this->swiftMessageId = $swiftMessageId;
    }

    /**
     * @return string
     */
    public function getBcc(): ? string
    {
        return json_decode($this->bcc, true);
    }

    /**
     * @param $bcc
     */
    public function setBcc($bcc): void
    {
        $this->bcc = json_encode($bcc);
    }

    /**
     * @return string
     */
    public function getCc(): ? string
    {
        return json_decode($this->cc, true);
    }

    /**
     * @param  $cc
     */
    public function setCc($cc): void
    {
        $this->cc = json_encode($cc);
    }

    /**
     * @return string
     */
    public function getReplyTo(): ? string
    {
        return $this->replyTo;
    }

    /**
     * @param $replyTo
     */
    public function setReplyTo($replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    /**
     * @return string
     */
    public function getReturnPath(): ? string
    {
        return $this->returnPath;
    }

    /**
     * @param $returnPath
     */
    public function setReturnPath($returnPath): void
    {
        $this->returnPath = $returnPath;
    }

    /**
     * @return string
     */
    public function getReadReceiptTo():? string
    {
        return json_decode($this->readReceiptTo, true);
    }

    /**
     * @param  $readReceiptTo
     */
    public function setReadReceiptTo($readReceiptTo): void
    {
        $this->readReceiptTo = json_encode($readReceiptTo);
    }

    /**
     * @return string
     */
    public function getBoundary(): string
    {
        return $this->boundary;
    }

    /**
     * @param string $boundary
     */
    public function setBoundary(string $boundary): void
    {
        $this->boundary = $boundary;
    }


}