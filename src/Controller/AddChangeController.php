<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AddChangeRepository;

class AddChangeController extends AbstractController
{
    /**
     * @Route("/addChange", name="addChange_index")
     */
    public function index(AddChangeRepository $repo)
    {
       $adds = $repo->findAll();

        return $this->render('add/index.html.twig', [
            'adds' => $adds,
        ]);
    }
}
