<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Enum\StatutDemande;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SecretaireController extends AbstractController
{
    #[Route('/secretaire', name: 'app_secretaire')]
    public function index(RendezVousRepository $rendezVousRepository): Response
    {
        $rendezVous = $rendezVousRepository->findAll();

        return $this->render('secretaire/index.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/secretaire/valider/{id}', name: 'app_secretaire_valider')]
    public function valider(
        RendezVous $rendezVous,
        EntityManagerInterface $em
    ): Response {
        $rendezVous->setStatut(StatutDemande::VALIDEE);
        $em->flush();

        $this->addFlash('success', 'Rendez-vous validé avec succès !');
        return $this->redirectToRoute('app_secretaire');
    }

    #[Route('/secretaire/refuser/{id}', name: 'app_secretaire_refuser')]
    public function refuser(
        RendezVous $rendezVous,
        EntityManagerInterface $em
    ): Response {
        $rendezVous->setStatut(StatutDemande::REFUSEE);
        $em->flush();

        $this->addFlash('warning', 'Rendez-vous refusé !');
        return $this->redirectToRoute('app_secretaire');
    }
}
