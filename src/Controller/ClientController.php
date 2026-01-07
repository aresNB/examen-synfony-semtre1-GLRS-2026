<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Enum\Prestation;
use App\Enum\Specialite;
use App\Form\RendezVousType;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClientController extends AbstractController
{
    #[Route('/client/rendez-vous', name: 'app_client_rendezvous')]
    public function nouveau(
        Request $request,
        EntityManagerInterface $em,
        PatientRepository $patientRepository
    ): Response {
        $rendezVous = new RendezVous();

        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Pour la démo, on prend le premier patient
            $patient = $patientRepository->findOneBy([], ['id' => 'ASC']);

            if ($patient) {
                $rendezVous->setPatient($patient);

                $em->persist($rendezVous);
                $em->flush();

                $this->addFlash('success', 'Votre rendez-vous a été enregistré avec succès !');
                return $this->redirectToRoute('app_client_rendezvous');
            }
        }

        return $this->render('client/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
