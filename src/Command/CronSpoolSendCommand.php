<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Command;

use CodeLab\Bundle\MailerBundle\Entity\MailingHistory;
use CodeLab\Bundle\MailerBundle\Services\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class CronSpoolSendCommand
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class CronSpoolSendCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'codelab:mailer:cron-spool-send';


    /**
     * @var Mailer
     */
    private $mailerService;

    /**
     * CronSpoolSendCommand constructor.
     * @param Mailer $mailerService
     * @param null|string $name
     */
    public function __construct(Mailer $mailerService, ?string $name = null)
    {
        parent::__construct($name);
        $this->mailerService = $mailerService;
    }

    /**
     * Configuring command
     */
    protected function configure()
    {
        $this->setDescription('Sending messages from cron spool');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->mailerService->sendCronEmails();

        /**
         * Execute sending cron emails
         */
        $this->mailerService->flushCronSpool();
    }

}
