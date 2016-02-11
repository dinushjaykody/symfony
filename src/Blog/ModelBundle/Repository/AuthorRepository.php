<?php

namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository
{
    /**
     * Find The First Author
     *
     * @return Author
     */
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('a.id','asc')
            ->setMaxResults(1);

        return $qb->getQuery()->getSingleResult();
    }

    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('ModelBundle:Author')
            ->createQueryBuilder('a');

        return $qb;
    }
}