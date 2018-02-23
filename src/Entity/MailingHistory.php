<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Entity;

use CodeLab\Bundle\MailerBundle\Message\AbstractMessageBuilder;

/**
 * Class MailingHistory
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class MailingHistory
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $creationTime;

    /**
     * @var \DateTime
     */
    private $sendAt;

    /**
     * @var \DateTime
     */
    private $sentAt;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $spoolType;

    /**
     * @var integer
     */
    private $priority;

    /**
     * @var string
     */
    private $state;

    /**
     * @var integer
     */
    private $sendAttempts;

    /**
     * @var string
     */
    private $errors;

    /**
     * @var string
     */
    private $sender;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $charset;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @var string
     */
    private $swiftMessageId;

    /**
     * @var string
     */
    private $bcc;

    /**
     * @var string
     */
    private $cc;

    /**
     * @var string
     */
    private $replyTo;

    /**
     * @var string
     */
    private $returnPath;

    /**
     * @var string
     */
    private $readReceiptTo;

    /**
     * @var string
     */
    private $boundary;


    public function __construct()
    {
        $this->creationTime = new \DateTime();
        $this->priority = AbstractMessageBuilder::PRIORITY_NORMAL;
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
    public function getErrors(): string
    {
        return json_decode($this->errors, true);
    }

    /**
     * @param string $errors
     */
    public function setErrors(string $errors): void
    {
        $this->errors = json_encode($errors);
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return json_decode($this->sender, true);
    }

    /**
     * @param string $sender
     */
    public function setSender(string $sender): void
    {
        $this->sender = json_encode($sender);
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return json_decode($this->from, true);
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = json_encode($from);
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return json_decode($this->to, true);
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = json_encode($to);
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getCharset(): string
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
    public function getContentType(): string
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
    public function getBcc(): string
    {
        return json_decode($this->bcc, true);
    }

    /**
     * @param string $bcc
     */
    public function setBcc(string $bcc): void
    {
        $this->bcc = json_encode($bcc);
    }

    /**
     * @return string
     */
    public function getCc(): string
    {
        return json_decode($this->cc, true);
    }

    /**
     * @param string $cc
     */
    public function setCc(string $cc): void
    {
        $this->cc = json_encode($cc);
    }

    /**
     * @return string
     */
    public function getReplyTo(): string
    {
        return $this->replyTo;
    }

    /**
     * @param string $replyTo
     */
    public function setReplyTo(string $replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    /**
     * @return string
     */
    public function getReturnPath(): string
    {
        return $this->returnPath;
    }

    /**
     * @param string $returnPath
     */
    public function setReturnPath(string $returnPath): void
    {
        $this->returnPath = $returnPath;
    }

    /**
     * @return string
     */
    public function getReadReceiptTo(): string
    {
        return json_decode($this->readReceiptTo, true);
    }

    /**
     * @param string $readReceiptTo
     */
    public function setReadReceiptTo(string $readReceiptTo): void
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