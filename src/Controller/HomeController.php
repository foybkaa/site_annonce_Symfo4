<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChangeAnnonceRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_index")
     */
    public function index(ChangeAnnonceRepository $repo)
    {
       $changesAnnonces = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'changeAnnonces' => $changesAnnonces
        ]);
    }

}
