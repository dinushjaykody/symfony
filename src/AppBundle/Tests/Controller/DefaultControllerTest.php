<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    /*
     * Tests posts index
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Homepage")')->count() > 0);
    }

/**
 * Test show post
 */
    public function testShow()
    {
        $client = static::createClient();
        /** @var Post $post */
        $post = $client->getContainer()->get('doctrine')->getManager()->getRepository('ModelBundle:Post')->findFirst();
        $crawler = $client->request('GET', '/en/'.$post->getSlug());
        $this->assertTrue($client->getResponse()->isSuccessful(), 'The response was not successful');
        $this->assertEquals($post->getTitle(), $crawler->filter('h1')->text(), 'Invalid post title');
        $this->assertGreaterThanOrEqual(1, $crawler->filter('article.comment')->count(), 'There should be at least 1 comment');
    }

}
