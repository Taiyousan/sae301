<?php

namespace App\Controller;

use App\Entity\Lieux;
use App\Entity\Manifestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class LieuxController extends AbstractController
{
    #[Route('/lieux', name: 'app_lieux')]
    public function show(ManagerRegistry $doctrine): Response
    {
        $lieux = $doctrine->getRepository(Lieux::class)->findAll();

        if (!$lieux) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }

        $test = 'tested';
        return $this->render('lieux/index.html.twig', [
            'allLieux' => $lieux,
        ]);
    }
}
