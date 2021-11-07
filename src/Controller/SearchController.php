<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Categorie;
use App\Entity\Fiche;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request, EntityManagerInterface $manager): Response
    {
        $fiche = new Fiche();
       
        $form = $this->createFormBuilder($fiche)
        ->add('titre')
        
        ->add('categorie', EntityType::class, [
            'class' => Categorie::class,
            'choice_label' => function ($category) {
                return $category->getNom();
            }
        ])
        ->add('contenu')
    
        ->add('save', SubmitType::class, [
            "attr" => [
                "class"=>"save_btn"
            ],
            'label' => 'Chercher'])
        ->getForm();


        $form->handleRequest($request);
        dump($request);
        dump($form);
        if($form->isSubmitted() && $form->isValid()){
          
            $fiche->setUser($this->getUser());
            //$manager->persist($fiche);
            //$manager->flush();
            return $this->redirectToRoute("index");
        }
        dump($fiche);
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
            'formFiche' => $form->createView()
        ]);
    }

   


}
