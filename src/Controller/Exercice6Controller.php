<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Exercice6Controller extends AbstractController
{
    #[Route('/exercice6/{nbr1}/{operateur}/{nbr2}', name: 'app_exercice6')]
    public function calculer($nbr1, $nbr2, $operateur) : Response 
    {
        return $this->render('exercice6/index.html.twig',[
            'nbr1' => $nbr1,
            'nbr2' => $nbr2,
            'operateur' => $operateur,
        ]);
    }
}
