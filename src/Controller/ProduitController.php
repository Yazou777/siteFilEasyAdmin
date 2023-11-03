<?php

namespace App\Controller;


use App\Entity\Produit;
use App\Entity\Categorie;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    #[Route('/produit/{cat_nom}', name: 'app_produit')]
    public function index( CategorieRepository $categorieRepository ,ProduitRepository $produitRepository ,$cat_nom): Response
    {
       $cat = $categorieRepository->findOneBy([ "cat_nom" => $cat_nom])->getId();
       $findby = $produitRepository->findBy(['cat' => $cat]);
       $catParentId = $categorieRepository->findOneBy([ "cat_nom" => $cat_nom])->getCatParent()->getId();
       $catParentName= $categorieRepository->findOneBy(['id' => $catParentId])->getCatNom();
       $nbProduit = $produitRepository->nbProduit($cat);
       //$x= $nbProduit[0][1];    
       // dd($nbProduit);
        return $this->render('produit/index.html.twig', [
            // 'Produit' => $Produit,
            'findby' => $findby,
            'catParentName' => $catParentName,
            'nbProduit' => $nbProduit,
            
            "chemin_de_fer" => [
                ["name" => $catParentName, "link" => "/accueil/".$catParentName],
                 ["name" => $cat_nom, "link" => "/produit/".$cat_nom],
            ]
        ]);
    }

    #[Route('/detail_produit/{pro_nom}', name: 'app_detail')]
    public function detail(ProduitRepository $produitRepository,CategorieRepository $categorieRepository , $pro_nom): Response
    {
        //on recupére les info du produit
        $proId = $produitRepository->findOneBy([ "pro_nom" => $pro_nom])->getId();
        $pro = $produitRepository->findOneBy([ "id" => $proId]);
        //on recupére la description du produit et on le decoupe en tableau pour l'afficher correctement
        $Description =  $produitRepository->findOneBy(['pro_nom' => $pro_nom])->getProDescription();
        $description = explode('*',$Description);
        //on recupere la categorie du produit
        $proCatId = $produitRepository->findOneBy([ "pro_nom" => $pro_nom])->getCat()->getId();
        //on recupere le nom de la categorie
        $catNom = $categorieRepository->findOneBy([ "id" => $proCatId])->getCatNom();
        //on recupere l'id cat_parent_id puis le nom cat_nom
        $catParentNom = $categorieRepository->findOneBy([ "id" => $proCatId])->getCatParent()->getCatNom();

        //dd($catParentId);
        return $this->render('produit/detail.html.twig', [
            'pro' => $pro,
            'description' => $description,
            "chemin_de_fer" => [
                 ["name" => $catParentNom, "link" => "/accueil/".$catParentNom],
                  ["name" => $catNom, "link" => "/produit/".$catNom],
                  ["name" => $pro_nom, "link" => "/detail_produit/".$pro_nom],
            ]
            
        ]);
    }
}
