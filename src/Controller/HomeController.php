<?php 

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{
    #[Route('/home',name:"app_home")]
        public function homeMessage() : Response{

        return new Response("Hello world");
    } 

    public function displayMessage() : Response{
        return new Response("Voici Mon Message");
}
    #[Route('/home/display/bis',name:"app_home_message_bis")]
    public function displayMessagebis() : Response{
        return new Response("Voici mon message Bis");

}
//EXERCICE 2 BONUS
    #[Route("/number/{nmbr1}/{nmbr2}",name:"app_number")]
    public function displayNumber($nmbr1,$nmbr2) : Response{
        if($nmbr1 == !(int)$nmbr1 || $nmbr2 == !(int)$nmbr2){
            return new Response("nbr1 ou nbr2 ne sont pas des nombres.");
        }else{
            $somme = $nmbr1 + $nmbr2;
            $response = "La somme des 2 nombres est égal à $somme";
            return new Response($response);
        } 
}
//EXERCICE 3
    #[Route("/calculate/{nmbr1}/{op}/{nmbr2}",name:"app_calculte")]
    public function displaycalculate($nmbr1,$nmbr2,$operateur) : Response{
        // Tester si nbr1 et nbr2 sont des nombres
        if($nmbr1 == !(int)$nmbr1 || $nmbr2 == !(int)$nmbr2){
            return new Response("nbr1 ou nbr2 ne sont pas des nombres.");
        }
    
      // Tester la division par 0
      if ($operateur === "div" && $nmbr2 === 0) {
        return new Response("Division par 0 impossible.");
      }
    
      // Tester l'opérateur
      $resultat = "";
      switch ($operateur) {
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
    
      // Générer la réponse
      $reponse = "L'opération $operateur de $nmbr1 et $nmbr2 vaut : $resultat";
    
      // Retourner la réponse
      return new Response($reponse);
    }
    





    }



