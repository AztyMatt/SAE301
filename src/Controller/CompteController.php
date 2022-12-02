<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Form\UserModificationType;
use App\Security\LoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use App\Entity\Client;
use App\Form\RegistrationFormType;
use Symfony\Contracts\Translation\TranslatorInterface;


class CompteController extends AbstractController
{
    #[Route('/compte', name: 'app_compte')]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('compte/compte.html.twig', [
            'user' => $user,
        ]);
    }
}
