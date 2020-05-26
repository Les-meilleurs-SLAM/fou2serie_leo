<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response as Response;

class SerieControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testPageIsUp($url)
    {
        $client = static::createClient();
        $client->request('GET', $url);
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    public function provideUrls()
    {
        return array(
            array('/infoSerie/1'),
            array('/infoSerie/2'),
            array('/infoSerie/3')
        );
    }

    public function testAddSerie()
    {
        self::bootKernel();
        $client = static::createClient();
        $crawler = $client->request('GET', '/ajoutserie');
        $form = $crawler->selectButton('Sauvegarder')->form([
            'serie[titre]' => 'testSerie'
        ]);
        $client->submit($form);
        $this->assertResponseRedirects('/admin');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $client->followRedirect();
        $this->assertSelectorTextContains('h4', 'testSerie');
    }
}
