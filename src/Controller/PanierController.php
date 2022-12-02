<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(): Response
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_paiement'))
            ->getForm();

        return $this->render('panier/panier.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/panier/paiement', name: 'app_paiement')]
    public function paiement(): Response
    {
        return $this->render('panier/paiement.html.twig');
    }

    #[Route('/panier/paiement_effectue', name: 'app_paiement_effectue')]
    public function paiement_effectue(): Response
    {
        return $this->render('panier/paiement_effectue.html.twig');
    }
}
