<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Utilisateur;
use App\Entity\Article;
use Faker;


class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");
        $categories = [];

        //boucle pour 30catégories
        for ($i=0; $i < 30 ; $i++) { 
            $cat = new Categorie();
            $cat->setNom($faker->firstName());
            $manager->persist($cat);
            $categories[] = $cat;
        }
      
        $utilisateur = [];
        //Boucle pour 50 Utilisateurs
        for ($i=0; $i < 50; $i++) { 
                $user = new Utilisateur();
                $user->setNom($faker->firstName('male'|'female'))
                    ->setPrenom($faker->lastName())
                    ->setEmail($faker->email())
                    ->setPassword($faker->md5());
                $manager->persist($user);
                $utilisateur[] = $user;

        }
        



        for ($i = 0; $i < 200; $i++) {
                $article = new Article();
                $article
                        ->setTitre($faker->word(3,true))
                        ->setContenu($faker->word(3,true))
                        ->setDateCreation(new \DateTimeImmutable("now"))
                        ->setUtilisateur($utilisateur[$faker->numberBetween(0,49)])
                        ->addCategory($categories[ $faker->numberBetween(0,9)])
                        ->addCategory($categories[ $faker->numberBetween(10,19)])
                        ->addCategory($categories[ $faker->numberBetween(20,29)]);
                        $manager->persist($article);
        }
        
                // // Attribuer 3 catégories aléatoires à l'article
                //     $randomCategories = [];
                //     for ($i = 0; $i < 3; $i++) {
                //         $randomCategories = $faker->randomElement($cat);
                //         if (!in_array($randomCategory, $randomCategories)) {
                //             $randomCategories[] = $randomCategories;
                //         }
                //     }
        
                //     foreach ($randomCategories as $categories) {
                //         $article->addCategory($categories);
                //     }
                   
                    $manager->flush();
                
            }
        }
        

        // $categorie = new Categorie();
        // $categorie->setNom("Actualite");
        // $manager->persist($categorie);
        // $manager->flush();
        //dump($categorie);
        // for ($i=0; $i < 30; $i++) { 
        //     $categorie = new Categorie();
        //     $categorie->setNom("Actualite");
        //     $manager->persist($categorie);

        // }

        // for ($i=0; $i < 50; $i++) { 
        //     $user = new Utilisateur();
        //     $user->setNom("Moi")
        //         ->setPrenom("calimero")
        //         ->setEmail("calimero@pascontent.com")
        //         ->setPassword(md5("1234"));
        //     $manager->persist($user);
         
        // }

        // for ($i=0; $i < 200; $i++) { 
        //     $article = new Article();
        //     $article->setTitre("Test article")
        //         ->setContenu("contenu")
        //         ->setDateCreation(new \DateTimeImmutable("2024-02-28"))
        //         ->setUtilisateur($user)
        //         ->addCategory($categorie);
        //     $manager->persist($article);
        
        // }
        // $manager->flush();
    

    

