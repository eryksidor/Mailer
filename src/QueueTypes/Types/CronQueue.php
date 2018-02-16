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
 * Class CronQueue
 * Queue for sending emails by cron
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class CronQueue extends AbstractQueueType
{

    /**
     * CronQueue constructor.
     */
    public function __construct()
    {
        $this->setName('MAILER_CRON_QUEUE');
    }

}