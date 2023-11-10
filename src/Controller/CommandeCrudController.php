<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Commande;
use App\Form\Commande1Type;
use App\Repository\PanierRepository;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/commande/crud')]

class CommandeCrudController extends AbstractController
{
   // #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'app_commande_crud_index', methods: ['GET'])]
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande_crud/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    #[Route('/mesCommande', name: 'app_commande_mon_index', methods: ['GET'])]
    public function monIndex(CommandeRepository $commandeRepository,PanierRepository $panierRepository): Response
    {
        // $x = $commandeRepository->findBy(['com_uti' => $this->getUser()]);
        //  $y = $commandeRepository->myCommandeByCom();
        //  dd($y);
       // dd($x[2]->getId());
        return $this->render('commande_crud/my_commande.html.twig', [
            'commandes' => $commandeRepository->findBy(['com_uti' => $this->getUser()]),
            //'myCommandes' => $commandeRepository->myCommande(),
            //'paniers' => $panierRepository->findBy(['pan_com' => ])
        ]);
    }

    #[Route('/mesCommande/{id}', name: 'app_my_commande_crud_show', methods: ['GET'])]
    public function showDetailCommande(Commande $commande, CommandeRepository $commandeRepository, $id): Response
    {
        $comId = $commandeRepository->findOneBy(['com_facture_id' => $id])->getId();
        $facId = $commandeRepository->findOneBy(['com_facture_id' => $id])->getComFactureId();
        $comDate = $commandeRepository->findOneBy(['com_facture_id' => $id])->getComDate();
        $facDate = $commandeRepository->findOneBy(['com_facture_id' => $id])->getComDate();
          // $y = $commandeRepository->myCommandeByCom($id);
        //    $y = $commandeRepository->totalPrixCom($id);
            //dd($comDate);
        // $t = $commandeRepository->myCommande();
        // dd($t);
        return $this->render('commande_crud/show_my_commande.html.twig', [
            //'commande' => $commande,
            'comId' => $comId,
            'facId' => $facId,
            'comDate' => $comDate,
            'facDate' => $facDate,
            'commandes' => $commandeRepository->myCommandeByCom($id),
            'totals' => $commandeRepository->totalPrixCom($id)
        ]);
    }

    #[Route('/new', name: 'app_commande_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commande = new Commande();
        $form = $this->createForm(Commande1Type::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commande);
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande_crud/new.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_crud_show', methods: ['GET'])]
    public function show(Commande $commande, CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande_crud/show.html.twig', [
            'commande' => $commande,
            'commandes' => $commandeRepository->myCommande()
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commande_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Commande $commande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Commande1Type::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commande_crud/edit.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Commande $commande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $entityManager->remove($commande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_commande_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
