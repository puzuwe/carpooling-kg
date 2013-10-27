<?php

namespace Podorozhniki\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RidesControllerTest extends WebTestCase
{
    public function testGetrides()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rides');
    }

    public function testGetride()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'ride/{id}');
    }

}
