<?php

namespace App\Controller;

use App\Repository\ManifestationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ManifsController extends AbstractController
{
    #[Route('/manifs', name: 'app_manifs')]
    public function listeManifs(ManifestationRepository $manifsRepository)
    {
        $manifs = $manifsRepository->findAll();

        return $this->render('manifs/index.html.twig', [
            'manifs' => $manifs
        ]);
    }
}
