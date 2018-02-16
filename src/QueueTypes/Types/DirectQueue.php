<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\QueueTypes\Types;

use CodeLab\Bundle\MailerBundle\QueueTypes\AbstractQueueType;

/**
 * Class DirectQueue
 * Queue user for sending emails after sending response to browser.
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class DirectQueue extends AbstractQueueType
{

    /**
     * DirectQueue constructor.
     */
    public function __construct()
    {
        $this->setName('MAILER_DIRECT_QUEUE');
    }

}