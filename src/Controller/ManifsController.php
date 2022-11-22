<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManifsController extends AbstractController
{
    #[Route('/manifs', name: 'app_manifs')]
    public function index(): Response
    {
        return $this->render('manifs/index.html.twig', [
            'controller_name' => 'ManifsController',
        ]);
    }
}
