<?php

namespace Blog\CoreBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PostManager
 * @package Blog\CoreBundle\Services
 */
class PostManager
{
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * find all posts
     *
     * @return array
     */
    public function findAll()
    {
        $posts = $this->em->getRepository('ModelBundle:Post')->findAll();

        return $posts;
    }

    /**
     * find latest post
     *
     * @param $num
     * @return array
     */
    public function findLatest($num)
    {
        $latestPost = $this->em->getRepository('ModelBundle:Post')->findLatest($num);

        return $latestPost;
    }

    /**
     * find the post by slug
     *
     * @param $slug
     * @return array
     *
     * @throws NotFoundhttpException
     */
    public function findBySlug($slug)
    {
        $post = $this->em->getRepository('ModelBundle:Post')->findOneBy(

            array(
                'slug' => $slug
            )
        );

        if (empty($post)){

            throw $this->createNotFoundException('This Post Was Not Found');
            throw new NotFoundHttpException('Post was not found');
        }
    }





}
