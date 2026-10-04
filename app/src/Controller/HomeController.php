<?php

namespace App\Controller;

use Nytodev\InertiaBundle\Service\Inertia;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function landing(): RedirectResponse
    {
        return $this->redirectToRoute('app_login');
    }

    #[Route('/home', name: 'app_home')]
    public function index(Inertia $inertia): Response
    {
        return $inertia->render('Home', [
            'message' => 'Hello, Inertia!',
        ]);
    }
}
