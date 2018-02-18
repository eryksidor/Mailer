<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Message;

use Symfony\Component\Validator\Validation;


/**
 * Class MailerMessage
 *
 * Description of MailerMessage. Its default class for prepare email message to send.
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class MailerMessage extends AbstractMessage implements MailerMessageInterface
{

    /**
     * MailerMessage constructor.
     * @param null|string $subject
     * @param null|string $body
     * @param null|string $contentType
     * @param null|string $charset
     */
    public function __construct(?string $subject = null, ?string $body = null, ?string $contentType = null, ?string $charset = null)
    {
        parent::__construct($subject, $body, $contentType, $charset);
    }

    /**
     * @return bool
     */
    public function send(): bool
    {

    }


}