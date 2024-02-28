<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class Exercice4Controller extends AbstractController
{
    #[Route('/exercice4/{nom}', name: 'app_exercice4')]
    public function displayname($nom): Response
    
    {
        return $this->render('exercice4/index.html.twig', [
            "nom" => $nom,
        ]);
    }


}
