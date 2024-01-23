<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Formation;
use App\Entity\User;
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
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(FormationCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Nos formations')
            // ->disableDarkMode()
            // ->renderContentMaximized()
            // ->renderSidebarMinimized()
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('Retour au site', 'fa-solid fa-arrow-rotate-left', 'homepage');

        yield MenuItem::section('Formation');
        yield MenuItem::linkToCrud('Crud Formation', 'fas fa-list', Formation::class);

        yield MenuItem::section('Categories');
        yield MenuItem::linkToCrud('Crud Category', 'fas fa-list', Category::class);

        yield MenuItem::section('Users');
        yield MenuItem::linkToCrud('Crud User', 'fa-solid fa-users', User::class);
    }
}
