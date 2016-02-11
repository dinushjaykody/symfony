<?php

namespace Blog\CoreBundle\Controller;

use Blog\ModelBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\ModelBundle\Form\CommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Blog\ModelBundle\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManager;

class PostController extends Controller
{

//    public function __construct(EntityManager $entityManager)
//    {
//        $this->em = $entityManager;
//    }

    /**
     * Show the Post Index
     *
     * @return array
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {

        //$posts = $this->getDoctrine()->getRepository('ModelBundle:Post')->findAll();
        $posts = $this->getPostManager()->findAll();
        $latestPosts = $this->getPostManager()->findLatest(2);

        //$latestPosts = $this->getDoctrine()->getRepository('ModelBundle:Post')->findLatest(2);


        return array(
            'posts'       => $posts,
            'latestPosts' => $latestPosts
        );
    }

    /**
     * Show a post
     *
     * @param string $slug
     * @return array
     * @throws NotFoundhttpException
     *
     * @Route("/{slug}")
     * @Template()
     */

    public function showAction($slug)
    {
//        $post = $this->getDoctrine()->getRepository('ModelBundle:Post')->findOneBy(
//
//            array(
//                'slug' => $slug
//            )
//        );

        $post = $this->getPostManager()->findBySlug($slug);


        if (empty($post)){

            throw $this->createNotFoundException('This Post Was Not Found');
        }

        $form = $this->createForm(new CommentType());

        return array(
            'post' => $post,
            'form' => $form->createView()
        );
    }

    /**
     * Create Comment
     *
     * @param Request $request
     * @param string $slug
     * @throws NotFoundHttpException
     * @return view
     *
     * @Route("/{slug}/create-comment")
     * @Method("POST")
     * @Template("CoreBundle:Post:show.html.twig")
     */
    public function createComment(Request $request, $slug){



        $post = $this->getDoctrine()->getRepository('ModelBundle:Post')->findOneBy(

           array(
               'slug' => $slug
           )
       );

        if ($post === null) {
            throw $this->createNotFoundException('Post Was Not Found');
        }

        $comment = new Comment();

        $comment->setPost($post);

        $form = $this->createForm(new CommentType(), $comment);


        $form->handleRequest($request);

        if ($form->isValid()) {
            //var_dump($comment); exit;
            $this->getDoctrine()->persist($comment);
            $this->getDoctrine()->flush();
        } else {
            $form->getErrorsAsString();
            $this->get('session')->getFlashBag()->add('success', 'Invalid Form');
        }

        $this->get('session')->getFlashBag()->add('success', 'Your Comment was Submitted Successfully');
        return $this->redirect($this->generateUrl('blog_core_post_show', array('slug' => $post->getSlug())));

        return array(
            'post' => $post,
            'form' => $form->createView()
        );
    }

    private function getPostManager()
    {
        return $this->get('postManager');
    }

}
