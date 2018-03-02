<?php

namespace CodeLab\Bundle\MailerBundle\EventListener;

use AppBundle\Entity\MailingHistory;
use CodeLab\Bundle\MailerBundle\Services\TransportLoggerService;
use Swift_Events_SendEvent;
use Swift_Events_SendListener;
use Symfony\Component\DependencyInjection\Container;


class SwiftmailerTransportListener implements Swift_Events_SendListener
{

    /**
     * @var TransportLoggerService
     */
    private $transportLogger;

    /**
     * SwiftmailerTransportListener constructor.
     * @param TransportLoggerService $transportLogger
     */
    public function __construct(TransportLoggerService $transportLogger)
    {
        $this->transportLogger = $transportLogger;
    }

    /**
     * @param Swift_Events_SendEvent $evt
     */
    public function beforeSendPerformed(Swift_Events_SendEvent $evt)
    {
    }


    /**
     * Log the event with each logger that was passed to this service. When spooling, Swift Mailer
     * dispatches the sendPerformed event twice, in that case, only log the second sendPerformed event
     *
     * @param Swift_Events_SendEvent $evt
     * @return bool
     */
    public function sendPerformed(Swift_Events_SendEvent $evt)
    {
        $this->transportLogger->updateMailingHistory($evt);
    }

}