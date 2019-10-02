<?php

namespace App\Tests\Functional\Controller\Api;

use App\Entity\Lead;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class LeadTest
 *
 * @package App\Tests\Functional\Controller\Api
 */
class LeadTest extends WebTestCase
{

    /**
     * @test
     */
    public function shouldCreateLead(): void
    {
        /** @var EntityRepository|MockObject $repository */
        $repository = $this->createMock(EntityRepository::class);

        $client = static::createClient();

        $parameters = [
            'student-id' => 1,
            'academic-offer-id' => 1,
            'portal' => 'www.www.www'
        ];

        $client->request(
            'POST',
            '/api/lead?' . http_build_query($parameters)
        );

        $expectedLead = $repository->findBy([
           'student' => 1,
           'academicOffer' => 1
        ]);

        $this->assertNotNull($expectedLead);
    }
}
