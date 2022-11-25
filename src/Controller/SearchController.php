<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ManifestationRepository;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends AbstractController
{
    #[Route(path: '/search', name: 'app_search')]
    public function search( Request $request, ManifestationRepository $ManifestationRepository): Response
    {
        $search = dump($request->query->get('search-input'));
        $result = $ManifestationRepository->findByTitre($search);
        return $this->render('search/index.html.twig', [
            'search' => $result
        ]);
    }
}