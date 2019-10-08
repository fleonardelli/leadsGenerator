<?php

namespace App\Tests\Functional\Controller\Api;

use App\Entity\Lead;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class LeadTest
 *
 * @package App\Tests\Functional\Controller\Api
 */
class LeadTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /** @var EntityRepository|ObjectRepository */
    private $repository;

    /*
     *
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->repository = $this->entityManager
            ->getRepository(Lead::class);
    }

    /**
     * @test
     */
    public function shouldCreateLead(): void
    {
        $client = static::createClient();

        $leadsCount = count($this->repository
            ->findAll());

        $parameters = [
            'student-id' => 1,
            'academic-offer-id' => 1,
            'portal' => 'www.www.www',
            'message' => 'some message'
        ];

        $client->request(
            'POST',
            '/api/lead',
            [],
            [],
            [],
            json_encode($parameters)
        );

        $this->assertEquals(
            $leadsCount + 1,
            count($this->repository->findAll())
        );
        $this->assertResponseStatusCodeSame(200);
    }

    /**
     * @test
     */
    public function shouldCreateLeadWithoutMessage(): void
    {
        $client = static::createClient();

        $leadsCount = count($this->repository
            ->findAll());

        $parameters = [
            'student-id' => 1,
            'academic-offer-id' => 2,
            'portal' => 'www.www.www',
        ];

        $client->request(
            'POST',
            '/api/lead',
            [],
            [],
            [],
            json_encode($parameters)
        );

        $this->assertEquals(
            $leadsCount + 1,
            count($this->repository->findAll())
        );
        $this->assertResponseStatusCodeSame(200);
    }

    /**
     * @test
     */
    public function shouldThrowErrorMessageWithKeyWhenMissingParameter(): void
    {
        $client = static::createClient();

        $leadsCount = count($this->repository
            ->findAll());

        $parameters = [
            'student-id' => 1,
            'portal' => 'www.www.www',
        ];

        $client->request(
            'POST',
            '/api/lead',
            [],
            [],
            [],
            json_encode($parameters)
        );

        $this->assertEquals(
            $leadsCount,
            count($this->repository->findAll())
        );

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('academic-offer-id', $response);

        $this->assertResponseStatusCodeSame(400);
    }


}
