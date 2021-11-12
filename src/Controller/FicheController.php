<?php

namespace App\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;
use App\Entity\Fiche;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;






class FicheController extends AbstractController
{



    /**
     * @Route("/fiche", name="fiche")
     */
    public function index(): Response
    {
        return $this->render('fiche/index.html.twig', [
            'controller_name' => 'FicheController',
        ]);
    }

    /**
     * @Route("/fiche/new", name="fiche_create")
     */
    public function create(Request $request, EntityManagerInterface $manager): Response
    {
        $fiche = new Fiche();
        $categorie = new Categorie();
        
        $form_cat = $this->createFormBuilder($categorie)
        ->add('nom')
        ->getForm();


        $form = $this->createFormBuilder($fiche)
        ->add('titre')
        
        ->add('categorie', EntityType::class, [
            'class' => Categorie::class,
            'choice_label' => function ($category) {
                return $category->getNom();
            }
        ])
        ->add('contenu', TextareaType::class, [
            'attr' => ['class' => 'contenu_field',
                        'rows' => 50],
        ])
     
        ->add('save', SubmitType::class, [
            "attr" => [
                "class"=>"save_btn"
            ],
            'label' => 'Enregistrer Fiche'])
        ->getForm();


        $form->handleRequest($request);
        dump($request);
        dump($form);
        if($form->isSubmitted() && $form->isValid()){
            $fiche->setDateCreation(new \Datetime);
            $fiche->setUser($this->getUser());
            $manager->persist($fiche);
            $manager->flush();
            return $this->redirectToRoute("index");
        }
        dump($fiche);
        return $this->render('fiche/create.html.twig', [
            'controller_name' => 'FicheController',
            'formFiche' => $form->createView()
        ]);
    }




 /**
     * @Route("/fiche/preview/", name="fiche_preview")
     */
    public function preview(): Response
    {
       $contenu = "";
        return $this->render('fiche/preview.html.twig', [
            'contenu' => $contenu
        ]);
    }







    /**
     * @Route("/fiche/{id}/edit", name="fiche_edit")
     */
    public function edit(): Response
    {
        return $this->render('fiche/edit.html.twig', [
            'controller_name' => 'FicheController',
        ]);
    }

    /**
     * @Route("/fiche/{id}/comment", name="fiche_comment")
     */
    public function comment(): Response
    {
        return $this->render('fiche/comment.html.twig', [
            'controller_name' => 'FicheController',
        ]);
    }
}
