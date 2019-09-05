<?php

namespace App\Controller;

use App\Entity\AcademicOffer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AcademicOfferController extends AbstractController
{
    /**
     * @Route("/academicoffer", name="academic_offers")
     */
    public function index(EntityManagerInterface $em)
    {
        $academicOffers = $em->getRepository(AcademicOffer::class)
            ->findAll();

        // @todo contemplar el caso de que no haya nada... Proablemente devolver un 404... Por ahora dejémoslo así pero
        // en general, al menos vayamos tomando notas de las cosas que quedan pendientes
        return $this->json(
            [
                'academicOffers' => $academicOffers
            ]
        );
    }

    /**
     * @Route("/academicoffer/{id}", name="academic_offer")
     */
    public function show(AcademicOffer $academicOffer)
    {
        return $this->json(
            [
                'academicOffer' => $academicOffer
            ]
        );
    }



}
