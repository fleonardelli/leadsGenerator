<?php

namespace App\Tests\Functional\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class AcademicOfferTest
 *
 * @package App\Tests\Functional\Controller\Api
 */
class AcademicOfferTest extends WebTestCase
{
    /**
     * @test
     */
    public function shouldReturn200WhenGetAcademicOffers(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/academicOffers');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @test
     */
    public function shouldReturn200WhenGetSpecificAcademicOffer(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/academicOffer/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @test
     */
    public function shouldReturnJsonWhenGetAcademicOffers(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/academicOffers');

        $this->assertJson($client->getResponse()->getContent());
    }

    /**
     * @test
     */
    public function shouldReturnJsonWhenSpecificGetAcademicOffers(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/academicOffer/1');

        $this->assertJson($client->getResponse()->getContent());
    }

    /**
     * @test
     */
    public function shouldReturnJsonWithKeysWhenExistAcademicOffers(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/academicOffers');

        $arrayResponse = json_decode($client->getResponse()->getContent(), true);

        $keys = [
            'name',
            'tematic_area',
            'offer_type',
            'course_mode',
            'duration',
            'time_table',
            'course_place',
            'institution',
            'leads'
        ];

        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, $arrayResponse[0]);
        }
    }

    /**
     * @test
     */
    public function shouldReturnJsonWithKeysWhenExistSpecificAcademicOffers(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/academicOffer/1');
        $arrayResponse = json_decode($client->getResponse()->getContent(), true);

        $keys = [
            'name',
            'tematic_area',
            'offer_type',
            'course_mode',
            'duration',
            'time_table',
            'course_place',
            'institution',
            'leads'
        ];

        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, $arrayResponse);
        }
    }

    /**
     * @test
     */
    public function shouldReturn404JsonWhenNotExistAcademicOffer(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/academicOffer/111');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
