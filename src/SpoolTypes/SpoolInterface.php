<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\SpoolTypes;

/**
 * Interface SpoolInterface
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
interface SpoolInterface
{
    /**
     * Default spool name used for sending emails during kernel terminate
     */
    CONST DEFAULT_SPOOL = 'MAILER_DEFAULT_SPOOL';

    /**
     * @return string
     *
     * Method return queue name
     *
     */
    public function getName(): string;
}