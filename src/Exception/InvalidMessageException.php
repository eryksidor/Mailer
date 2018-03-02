<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Message;

use Throwable;


/**
 * Class InvalidMessageException
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class InvalidMessageException extends MailerException
{
    public function __construct(string $message = "Invalid MailerMessage type", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}