<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FinalPanierController extends AbstractController
{
<<<<<<< HEAD
    #[Route('/final/panier', name: 'app_final_panier')]
    public function index(): Response
    {

=======
    #[Route('/final_panier', name: 'app_final_panier')]
    public function index(): Response
    {
>>>>>>> 5e4ccd1519a4a68a0ec62acac68e7ae6c8e57172
        return $this->render('final_panier/index.html.twig', [
            'controller_name' => 'FinalPanierController',
        ]);
    }
}
