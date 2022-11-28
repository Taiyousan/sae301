<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BababoiController extends AbstractController
{
    #[Route('/bababoi', name: 'app_bababoi')]
    public function index(): Response
    {
        return $this->render('bababoi/index.html.twig', [
            'controller_name' => 'BababoiController',
        ]);
    }
}
