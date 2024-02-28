<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Exercice5Controller extends AbstractController
{
    #[Route('/exercice5/{nmbr1}/{operation}/{nmbr2}', name: 'app_exercice5')]
    
    public function displayCalculator($nmbr1,$nmbr2,$operation) : Response
    {
          // Tester si nbr1 et nbr2 sont des nombres
          if($nmbr1 == !(int)$nmbr1 || $nmbr2 == !(int)$nmbr2){
            return new Response("nbr1 ou nbr2 ne sont pas des nombres.");
        }
    
      // Tester la division par 0
      if ($operation === "div" && $nmbr2 === 0) {
        return new Response("Division par 0 impossible.");
      }
       try{
        $resultat = "";
        switch ($operation) {
          case "add":
            $resultat = $nmbr1 + $nmbr2;
            break;
          case "sub":
            $resultat = $nmbr1 - $nmbr2;
            break;
          case "multi":
            $resultat = $nmbr1 * $nmbr2;
            break;
          case "div":
            $resultat = $nmbr1 / $nmbr2;
            break;
          default:
           $resultat = "Opérateur invalide. Veuillez utiliser add, sub, multi ou div.";
        }


       }catch(\Throwable $th){
             $resultat = $th->getMessage();
       }
 
      return $this->render('exercice5/index.html.twig', [
        'nmbr1' => $nmbr1,
        'nmbr2' => $nmbr2,
        'operation' => $operation,
        'resultat' => $resultat,
       
    ]);

}
}
