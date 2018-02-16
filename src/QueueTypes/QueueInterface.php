<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\QueueTypes;

/**
 * Interface QueueInterface
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
interface QueueInterface
{
    /**
     * Default queue name used for sending emails during kernel terminate
     */
    CONST DEFAULT_QUEUE = 'MAILER_DEFAULT_QUQUE';

    /**
     * @return string
     *
     * Method return queue name
     *
     */
    public function getName(): string;
}