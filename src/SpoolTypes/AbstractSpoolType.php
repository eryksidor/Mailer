<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\SpoolTypes;


/**
 * Class AbstractSpoolType
 * Description of spool. spool are used for sending emails.
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
abstract class AbstractSpoolType implements SpoolInterface
{

    /**
     * @var string
     */
    private $name = self::DEFAULT_SPOOL;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name) :void{
        $this->name = $name;
    }

}