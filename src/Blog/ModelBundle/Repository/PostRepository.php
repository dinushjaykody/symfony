<?php

namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    /**
     * Find the latest post
     *
     * @param $num
     * @return Array
     */

    public function findLatest($num){

       $qb =  $this->getQueryBuilder()
            ->orderBy('p.createdAt','desc')
            ->setMaxResults($num);

        return $qb->getQuery()->getResult();

    }

    /**
     * Find the first post
     *
     * @return Post
     */

    public function findFirst(){
        $qb = $this->getQueryBuilder()
            ->orderBy('p.id','asc')
            ->setMaxResults(1);

        return $qb->getQuery()->getSingleResult();
    }

    private function getQueryBuilder(){

        $em = $this->getEntityManager();

        $qb = $em->getRepository('ModelBundle:Post')
            ->createQueryBuilder('p');

        return $qb;
    }


//    public function findLatest ($num)
//    {
//        $repository = $this->getEntityManager()
//            ->getRepository('ModelBundle:Post');
//
//        $query = $repository->createQueryBuilder('p')
//            ->orderBy('p.createdAt','desc')
//            ->setMaxResults($num);
//
//        return $query->getQuery()->getResult();
//    }

}