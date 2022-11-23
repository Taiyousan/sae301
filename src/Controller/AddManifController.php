<?php

namespace App\Controller;

use App\Entity\Manifestation;
use App\Form\ManifType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class AddManifController extends AbstractController
{
    
    #[Route('/manif/add', name: 'app_add_manif', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $manif = new Manifestation();
        // ...

        $form = $this->createForm(ManifType::class, $manif);
        
        $form->handleRequest($request); // hydratation du form 
        if($form->isSubmitted() && $form->isValid()){ // test si le formulaire a été soumis et s'il est valide
        $entityManager->persist($manif); // on effectue les mise à jours internes
        $entityManager->flush(); // on effectue la mise à jour vers la base de données
        return $this->redirectToRoute('app_manif'); // on redirige vers la route show_task avec l'id du post créé ou modifié 
  }

        return $this->renderForm('manif/addManif.html.twig', [
            'form' => $form,
        ]);

       
    }

    
}

