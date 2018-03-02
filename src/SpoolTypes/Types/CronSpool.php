<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\SpoolTypes\Types;

use CodeLab\Bundle\MailerBundle\SpoolTypes\AbstractSpoolType;


/**
 * Class CronSpool
 * Spool for sending emails by cron
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class CronSpool extends AbstractSpoolType
{

    /**
     * CronQueue constructor.
     */
    public function __construct()
    {
        $this->setName(self::CRON_SPOOL);
    }

}