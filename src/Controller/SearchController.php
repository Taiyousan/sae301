<?php

namespace App\Controller;

use App\Repository\ManifestationRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    public function searchBar()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('handleSearch'))
            ->add('query', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'home-searchbar',
                    'placeholder' => 'Recherchez un spectacle !'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'home-searchbar-button'
                ]
            ])
            ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
     #[Route('/handleSearch', name: "handleSearch")]
     
    public function handleSearch(Request $request, ManifestationRepository $repo)
    {
        $query = $request->request->all('form')['query'];
        if($query) {
            $searchResult = $repo->findArticlesByName($query);
        }
        return $this->render('manif/manif.html.twig', [
            'searchResult' => $searchResult
        ]);
    }
}
