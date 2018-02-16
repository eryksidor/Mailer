<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\QueueTypes;


/**
 * Class AbstractQueueType
 * Description of queue. Queues are used for sending emails.
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
abstract class AbstractQueueType implements QueueInterface
{

    /**
     * @var string
     */
    private $name = self::DEFAULT_QUEUE;

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