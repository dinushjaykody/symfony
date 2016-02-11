<?php

namespace Blog\CoreBundle\Services;

use Blog\ModelBundle\Entity\Author;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AuthorManager
 * @package Blog\CoreBundle\Services
 */
class AuthorManager
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Find Author By Slug
     *
     * @param $slug
     * @throws NotFoundHttpException
     * @return Author
     *
     */
    public function findBySlug($slug)
    {
        $author = $this->em->getRepository('ModelBundle:Author')->findOneBy(

            array(
                'slug' => $slug
            )
        );

        if (!$author){
            throw new NotFoundHttpException('Author Not Found');
        }

        return $author;
    }

    /**
     * Find Posts For s Given Author
     *
     * @param Author $author
     * @throws NotFoundHttpException
     * @return Array
     */
    public function findPosts(Author $author)
    {
        $posts = $this->em->getRepository('ModelBundle:Posts')->findBy(

            array(
                'author'=>$author
            )
        );

        if (!$posts){
            throw new NotFoundHttpException('Posts Not Found');
        }
    }
}
