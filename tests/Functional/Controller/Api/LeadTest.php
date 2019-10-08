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
            'message' => 'pepe'
        ];

        $client->request(
            'POST',
            '/api/lead',
            [],
            [],
            [],
            json_encode($parameters)
        );

        $expectedLead = $this->repository
            ->findBy([
                'student' => 1,
                'academicOffer' => 1
            ]);

        $this->assertNotNull($expectedLead);
        $this->assertEquals(
            $leadsCount + 1,
            count($this->repository->findAll())
        );
    }
}
