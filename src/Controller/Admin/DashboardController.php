<?php

namespace App\Controller\Admin;

use App\Controller\ManifController;
use App\Entity\Manifestation;
use App\Entity\User;
use App\Entity\Lieux;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use PharIo\Manifest\Manifest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('LA COHORTE');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-gear');
        yield MenuItem::linkToRoute('Retour au site', 'fa fa-home', 'app_accueil');
        yield MenuItem::linkToCrud('Gérer les spectacles', 'fas fa-masks-theater', Manifestation::class);
        yield MenuItem::linkToCrud('Gérer les utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Gérer les lieux', 'fas fa-map', Lieux::class);
    }
}
