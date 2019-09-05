<?php

namespace App\Controller;

use App\Entity\Institution;
use App\Entity\Lead;
use App\Form\LeadType;
use App\Repository\LeadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lead")
 */
class LeadController extends AbstractController
{
    /**
     * @Route("/{institution}", name="lead_index", methods={"GET"})
     */
    public function index(LeadRepository $leadRepository, Institution $institution): Response
    {
        //TODO: This is the endpoint for external CRM. Should set got_from_crm = 1.
        return $this->json([
            'leads' => $leadRepository->findBy(['institution' => $institution->getId()]),
        ]);
    }

    /**
     * @Route("/new", name="lead_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lead = new Lead();
        $form = $this->createForm(LeadType::class, $lead);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lead);
            $entityManager->flush();

            return $this->json(['lead' => $lead]);
        }

        return $this->json(['code' => 400]);
    }

}
