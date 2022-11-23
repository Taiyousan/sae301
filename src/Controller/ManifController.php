<?php

namespace App\Controller;

use App\Entity\Manifestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ManifController extends AbstractController
{
    // #[Route('/manif/{id}', name: 'app_manif_show')]
    // public function show(ManagerRegistry $doctrine, int $id): Response
    // {
    //     $manif = $doctrine->getRepository(Manifestation::class)->find($id);

    //     if (!$manif) {
    //         throw $this->createNotFoundException(
    //             'No product found for id '.$id
    //         );
    //     }

    //     $test = 'tested';
    //     return $this->render('manif/manif.html.twig', [
    //         'idTitre' => $manif->getManifTitre(),
    //     ]);

    //     // or render a template
    //     // in the template, print things with {{ product.name }}
    //     // return $this->render('product/show.html.twig', ['product' => $product]);
    // }
    
    #[Route('/manif', name: 'app_manif_show')]
    public function show(ManagerRegistry $doctrine): Response
    {
        $manif = $doctrine->getRepository(Manifestation::class)->findAll();

        if (!$manif) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }

        $test = 'tested';
        return $this->render('manif/manif.html.twig', [
            'allManif' => $manif,
        ]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
