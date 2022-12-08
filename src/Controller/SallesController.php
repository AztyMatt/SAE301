<?php

namespace App\Controller;

use App\Repository\SalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SallesController extends AbstractController
{
    #[Route('/salles', name: 'app_salles')]
    public function listeSalles(SalleRepository $salleRepository)
    {
        $salles = $salleRepository->findAll();

        return $this->render('salles/salles.html.twig', [
            'salles' => $salles
        ]);
    }
}
