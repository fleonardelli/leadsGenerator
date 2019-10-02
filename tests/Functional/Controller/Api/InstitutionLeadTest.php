<?php

namespace App\Tests\Functional\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class InstitutionLeadTest
 *
 * @package App\Tests\Functional\Controller\Api
 */
class InstitutionLeadTest extends WebTestCase
{
    /**
     * @test
     */
    public function shouldReturn200WhenGetInstitutionLeads(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/institution/1/leads');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @test
     */
    public function shouldReturnJsonWhenGetInstitutionLeads(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/institution/1/leads');

        $this->assertJson($client->getResponse()->getContent());
    }

    /**
     * @test
     */
    public function shouldReturnJsonWithKeysWhenGetInstitutionLeads(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/institution/1/leads');

        $arrayResponse = json_decode($client->getResponse()->getContent(), true);

        $keys = [
            'student',
            'from_portal',
            'created_at',
        ];

        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, current($arrayResponse)[0]);
        }
    }

    /**
    * @test
    */
    public function shouldReturn404WhenInstitutionNotExist(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/institution/111/leads');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
