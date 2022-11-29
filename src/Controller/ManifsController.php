<?php

namespace App\Controller;

use App\Repository\ManifestationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ManifsController extends AbstractController
{
    #[Route(path: '/manifs', name: 'app_manifs')]
    public function searchBar(ManifestationRepository $manifsRepository)
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_search'))
            ->add('search', TextType::class)
            ->getForm();

        $manifs = $manifsRepository->findAll();

        return $this->render('manifs/manifs.html.twig', [
            'form' => $form->createView(),
            'manifs' => $manifs
        ]);
    }

    #[Route(path: '/search', name: 'app_search')]
    public function search( Request $request, ManifestationRepository $ManifestationRepository)
    {
        $search = $request->request->all('form')['search'];
        $result = $ManifestationRepository->findByTitre($search);
        return $this->render('manifs/search.html.twig', [
           'search' => $result
        ]);
    }
}
