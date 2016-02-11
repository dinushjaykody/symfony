<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Blog\CoreBundle\Services;

/**
 * Class AuthorController
 */
class AuthorController extends Controller
{
    /**
     * Show Posts By Author
     *
     * @param string $slug
     * @return array
     *
     * @Route("/author/{slug}")
     * @Template("CoreBundle:Author:show.html.twig")
     */
    public function showAction($slug)
    {

//        $author = $this->getDoctrine()->getRepository('ModelBundle:Author')->findOneBy(
//
//            array(
//              'slug' => $slug
//          )
//        );

        $author = $this->getAuthorManager()->findBySlug($slug);

        if ($author === null) {

            throw $this->createNotFoundException('Author Was Not Found');
        }

        $posts = $this->getAuthorManager()->findPosts($author);

//        $post = $this->getDoctrine()->getRepository('ModelBundle:Post')->findOneBy(
//
//            array(
//                'author' => $author
//            )
//        );

        return array(
            'post' => $posts,
            'author' => $author
        );

    }

    private function getAuthorManager()
    {
        return $this->get('authorManager');
    }

}
