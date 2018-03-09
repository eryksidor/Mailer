<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Repository;

use App\Entity\User;
use CodeLab\Bundle\MailerBundle\Entity\MailingHistory;
use CodeLab\Bundle\MailerBundle\SpoolTypes\Types\CronSpool;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MailingHistoryRepository extends EntityRepository
{

    /**
     * Get messages for sending by cron
     * @return mixed
     */
    public function getMessagesForCronSpoolSend($resentInterval){
        $qb = $this->createQueryBuilder('qb');

        $qb->from(MailingHistory::class, 'email');
        $qb->where('qb.state = :stateForCron AND qb.spoolType = :spoolTypeForCron AND (qb.sendAt IS NULL or qb.sendAt <= :today)');
        $qb->orWhere("qb.state = '" . MailingHistory::MESSAGE_STATE_FAILED . "' AND qb.sendAttempts < 3 AND (qb.updateTime IS NULL OR qb.updateTime <= :resendInterval)");

        $qb->setParameter('stateForCron', MailingHistory::MESSAGE_STATE_PLANNED);
        $qb->setParameter('spoolTypeForCron', CronSpool::CRON_SPOOL);
        $qb->setParameter('today', time());
        $qb->setParameter('resendInterval', (new \DateTime())->sub(new \DateInterval("PT{$resentInterval}M")));

        $qb->orderBy('qb.priority', 'ASC');
        $qb->orderBy('qb.creationTime', 'ASC');

        return $qb->getQuery()->getResult();
    }


}
