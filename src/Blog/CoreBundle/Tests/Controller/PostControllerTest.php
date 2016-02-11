<?php

namespace Blog\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{


    /**
     * Tests Posts index
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful(), 'This Response Was Not Successful');

        $this->assertCount(3, $crawler->filter('h2'), 'There should be 3 displayed headings');
    }

    /**
     * Test create a comment
     */
    public function testCreateComment()
    {
        $client = static::createClient();
        /** @var Post $post */
        $post = $client->getContainer()->get('doctrine')->getManager()->getRepository('ModelBundle:Post')->findFirst();
        $crawler = $client->request('GET', '/en/'.$post->getSlug());
        $buttonCrawlerNode = $crawler->selectButton('Send');
        $form = $buttonCrawlerNode->form(array(
            'blog_modelbundle_comment[authorName]' => 'A humble commenter',
            'blog_modelbundle_comment[body]' => "Hi! I'm commenting about Symfony2!"
        ));
        $client->submit($form);
        $this->assertTrue(
            $client->getResponse()->isRedirect('/en/'.$post->getSlug()), 'There was no redirection after submitting the form'
        );
        $crawler = $client->followRedirect();
        $this->assertCount(
            1,
            $crawler->filter('html:contains("Your comment was submitted successfully")'),
            'There was not any confirmation message'
        );
    }

}
