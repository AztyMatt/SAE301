<?php

namespace App\Controller;

use App\Repository\ManifestationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route(path: '/', name: 'app_accueil')]
    public function searchBar(ManifestationRepository $manifsRepository)
    {
        $manifs = $manifsRepository->findByHighest();

        return $this->render('accueil/accueil.html.twig', [
            'manifs' => $manifs
        ]);
    }
}
