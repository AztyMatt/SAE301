<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Commande;
use App\Security\LoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;


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

    //#[Route('/panier', name: 'app_panier')]
    //    public function send_list(Request $request, UserAuthenticatorInterface $userAuthenticator, LoginAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    //    {
    //        $user = $this->getUser();
    //        $id = $user->getId();
    //        $command = new Commande();
    //        $form = $this->createFormBuilder()
    //            ->getForm();
    //        $form->handleRequest($request);
    //
    //        if ($form->isSubmitted() && $form->isValid()) {
    //            $command->setCommandeDate(new \DateTime());
    //            $command->setClientId(2);
    //            $entityManager->persist($command);
    //            var_dump($command);
    //            $entityManager->flush();
    //            // do anything else you need here, like send an email
    //        }
    //
    //        return $this->render('panier/panier.html.twig', [
    //            'form' => $form->createView(),
    //        ]);
    //    }

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
