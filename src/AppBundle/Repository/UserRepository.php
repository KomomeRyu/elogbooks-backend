<?php

namespace AppBundle\Repository;

use AppBundle\Form\FilterType\Model\UserFilter;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class UserRepository
 * @package AppBundle\Repository
 */
class UserRepository extends EntityRepository
{
    /**
     * @param ListFilter $listFilterModel
     *
     * @return QueryBuilder
     */
    public function filterAndReturnQuery(UserFilter $listFilterModel)
    {
        $qb = $this->createQueryBuilder('u')
            ->setMaxResults(UserFilter::LIMIT)
        ;

        $this->applyFilter($qb, $listFilterModel);

        return $qb->getQuery();
    }

    /**
     * @param QueryBuilder $qb
     * @param ListFilter   $listFilterModel
     *
     * @return $this
     */
    public function applyFilter(QueryBuilder $qb, UserFilter $listFilterModel)
    {

        if ($listFilterModel->getOrderKey()) {
            $qb->orderBy(
                sprintf('u.%s', $listFilterModel->getOrderKey()),
                $listFilterModel->getOrderDirection()
            );
        }

        if($listFilterModel->getName())
        {
          $qb
            ->andWhere(sprintf(" u.name = %d ", $listFilterModel->getName()));
        }

        if($listFilterModel->getEmail())
        {
            $qb
                ->andWhere(sprintf(" u.email = '%s' ", $listFilterModel->getEmail()));
        }
        if($listFilterModel->getJobId())
        {
            $qb
                ->andWhere(sprintf("u.jobid = '%s' ",$listFilterModel->getJobId()));
        }
    }
}
