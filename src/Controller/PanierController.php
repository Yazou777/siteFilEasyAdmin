<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, ProduitRepository $produitRepository): Response
    {
        $panier = $session->get('panier', []);
        // vide le panier
        //$session->set('panier', []);

        // On initialise des variables
        $data = [];
        $total = 0;
        $totalQte = 0;
        foreach($panier as $id => $quantity){
            $produit = $produitRepository->find($id);

            $data[] = [
                'produit' => $produit,
                'quantite' => $quantity
            ];
            $total += $produit->getProPrix() * $quantity;
            $totalQte +=  $quantity;
        }
        //dd($data);
        //return $this->render('panier/index.html.twig',compact('data','total','totalQte'));
        return $this->render('panier/index.html.twig',[
            "data" => $data,
            "total" => $total,
            "totalQte" => $totalQte,
        //     "chemin_de_fer" => [
        //         ["name" => $catParentNom, "link" => "/accueil/".$catParentNom],
        //          ["name" => $catNom, "link" => "/produit/".$catNom],
        //          ["name" => $pro_nom, "link" => "/detail_produit/".$pro_nom],
        //    ]
        ]);
    }




    #[Route('/add/{id}', name: 'add')]
    public function add(Produit $produit, SessionInterface $session): Response
    {

        //On récupère l'id du produit
        $id = $produit->getId();

        // On récupère le panier existant
        $panier = $session->get('panier', []);

          // On ajoute le produit dans le panier s'il n'y est pas encore
        // Sinon on incrémente sa quantité
        if(empty($panier[$id])){
            $panier[$id] = 1;
        }else{
            $panier[$id]++;
        }


        //$panier[1] = 1;

        $session->set('panier', $panier);
        // dd($session);
        //On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
      
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Produit $produit, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $produit->getId();

        // On récupère le panier existant
        $panier = $session->get('panier', []);

        // On retire le produit du panier s'il n'y a qu'1 exemplaire
        // Sinon on décrémente sa quantité
        if(!empty($panier[$id])){
            if($panier[$id] > 1){
                $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }

        $session->set('panier', $panier);
        
        //On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Produit $produit, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $produit->getId();

        // On récupère le panier existant
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }

        $session->set('panier', $panier);
        
        //On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }


    #[Route('/empty', name: 'empty')]
    public function empty(SessionInterface $session)
    {
        $session->remove('panier');

        return $this->redirectToRoute('panier_index');
    }
}
