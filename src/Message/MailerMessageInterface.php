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
 * Interface MailerMessageInterface
 *
 * Provide default message constants
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
interface MailerMessageInterface
{

    /**
     * Message content types
     */
    CONST MESSAGE_CONTENT_TYPE_TEXT_PLAIN = 'text/plain';
    CONST MESSAGE_CONTENT_TYPE_TEXT_HTML = 'text/html';

    /**
     * Message priorities
     */
    CONST MESSAGE_PRIORITY_HIGHEST = 1;
    CONST MESSAGE_PRIORITY_HIGH = 2;
    CONST MESSAGE_PRIORITY_NORMAL = 3;
    CONST MESSAGE_PRIORITY_LOW = 4;
    CONST MESSAGE_PRIORITY_LOWEST = 5;

    /**
     * @return bool
     */
    public function send(): bool;

}