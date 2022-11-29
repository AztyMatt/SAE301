<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use App\Entity\Manifestation;
use App\Entity\Salle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SQY Culture')
            ->disableDarkMode();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Clients', 'fa-solid fa-user', Client::class);
        yield MenuItem::linkToCrud('Manifestations', 'fa-solid fa-masks-theater', Manifestation::class);
        yield MenuItem::linkToCrud('Salles', 'fa-solid fa-building', Salle::class);
    }
}
