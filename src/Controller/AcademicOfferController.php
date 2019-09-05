<?php

namespace App\Controller;

use App\Entity\AcademicOffer;
use App\Form\AcademicOfferType;
use App\Repository\AcademicOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offer")
 */
class AcademicOfferController extends AbstractController
{
    /**
     * @Route("/", name="academic_offer_index", methods={"GET"})
     */
    public function index(AcademicOfferRepository $academicOfferRepository): Response
    {
        return $this->json([
            'academic_offers' => $academicOfferRepository->findBy(['active' => 1]),
        ]);
    }

    /**
     * @Route("/new", name="academic_offer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $academicOffer = new AcademicOffer();
        $form = $this->createForm(AcademicOfferType::class, $academicOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($academicOffer);
            $entityManager->flush();

            return $this->redirectToRoute('academic_offer_index');
        }

        return $this->json(['code' => 400]);
    }

    /**
     * @Route("/{id}", name="academic_offer_show", methods={"GET"})
     */
    public function show(AcademicOffer $academicOffer): Response
    {
        return $this->json([
            'academic_offer' => $academicOffer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="academic_offer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AcademicOffer $academicOffer): Response
    {
        $form = $this->createForm(AcademicOfferType::class, $academicOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('academic_offer_index');
        }

        return $this->json(['code' => 400]);
    }

    /**
     * @Route("/{id}", name="academic_offer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AcademicOffer $academicOffer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$academicOffer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($academicOffer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('academic_offer_index');
    }
}
