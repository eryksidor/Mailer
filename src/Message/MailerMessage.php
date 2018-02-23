<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Message;

use CodeLab\Bundle\MailerBundle\SpoolTypes\SpoolInterface;

/**
 * Class MailerMessage
 * Description of MailerMessage. This is main class for creating and sending emails.
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
abstract class MailerMessage extends AbstractMessageBuilder implements MailerMessageInterface
{

    /**
     * @var SpoolInterface
     */
    private $spool;

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

}