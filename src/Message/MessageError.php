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
 * Class MessageError
 * Description of mailer message error element
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
final class MessageError
{

    /**
     * Error target set after error occured during message sending
     */
    CONST MESSAGE_ERROR_TARGET_TRANSPORT = 'TRANSPORT';

    /**
     * @var
     */
    private $message;

    /**
     * @var
     */
    private $target;

    /**
     * MessageError constructor.
     * @param $message
     * @param $target
     */
    public function __construct($message, $target)
    {
        $this->message = $message;
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }


}