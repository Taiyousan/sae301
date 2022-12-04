<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FinalPanierController extends AbstractController
{
    #[Route('/final_panier', name: 'app_final_panier')]
    public function index(): Response
    {

        $liste = $_POST['liste'];

        return $this->render('final_panier/index.html.twig', [
            'controller_name' => 'FinalPanierController', "Liste" => $liste
        ]);
    }
}
