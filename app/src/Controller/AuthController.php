<?php

namespace App\Controller;

use Nytodev\InertiaBundle\Service\Inertia;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthController extends AbstractController
{
    #[Route('/register', name: 'app_register', methods: ['GET'])]
    public function register(Inertia $inertia): Response
    {
        return $inertia->render('Register');
    }

    #[Route('/forgot-password', name: 'app_forgot_password', methods: ['GET'])]
    public function forgotPassword(Inertia $inertia): Response
    {
        return $inertia->render('ForgotPassword');
    }
}
