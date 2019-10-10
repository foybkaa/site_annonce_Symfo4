<?php

namespace App\Controller;

use App\Entity\ChangeAnnonce;
use App\Form\ChangeAnnonceType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ChangeAnnonceController extends AbstractController
{ 
    /**
     * Permet de créer une annonce 
     * 
     * @Route("/changeAnnonce/create", name="changeAnnonce_create")
     * 
     */
    public function create(Request $request, ObjectManager $manager){
        $changeAnnonce = new ChangeAnnonce();

        $form = $this->createForm(ChangeAnnonceType::class, $changeAnnonce);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
            $manager->persist($changeAnnonce);
            $manager->flush();

            $this->addFlash(
                'success',
                "Votre annonce à bien été enregistrée !"
            );

            return $this->redirectToRoute('changeAnnonce_show', [
                'id' => $changeAnnonce->getId()
            ]);
        }
        return $this->render('changeAnnonce/new.html.twig', [
                'form' => $form->createView()
            ]);
    }
    
    /**
     * Permet de modifier une annonce 
     * 
     * @Route("/changeAnnonce/{id}/edit", name="changeAnnonce_edit")
     * 
     */
    public function edit(changeAnnonce $changeAnnonce, Request $request, ObjectManager $manager){
        $form = $this->createForm(ChangeAnnonceType::class, $changeAnnonce);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
            $manager->persist($changeAnnonce);
            $manager->flush();

            $this->addFlash(
                'success',
                "Votre annonce à bien été modifié !"
            );

            return $this->redirectToRoute('changeAnnonce_show', [
                'id' => $changeAnnonce->getId()
            ]);
        }

        return $this->render('changeAnnonce/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Permet d'afficher une seul annonce
     * 
     * @Route("/changeAnnonce/{id}", name="changeAnnonce_show")
     */
    public function show(ChangeAnnonce $change)
    {
        return $this->render('changeAnnonce/show.html.twig', [
            'change' => $change
        ]);
    }

   
}
