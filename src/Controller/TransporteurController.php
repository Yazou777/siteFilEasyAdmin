<?php

namespace App\Controller;

use App\Entity\Transporteur;
use App\Form\TransporteurType;
use App\Repository\TransporteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/transporteur')]
class TransporteurController extends AbstractController
{
    #[Route('/', name: 'app_transporteur_index', methods: ['GET'])]
    public function index(TransporteurRepository $transporteurRepository): Response
    {
        return $this->render('transporteur/index.html.twig', [
            'transporteurs' => $transporteurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_transporteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $transporteur = new Transporteur();
        $form = $this->createForm(TransporteurType::class, $transporteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($transporteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_transporteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('transporteur/new.html.twig', [
            'transporteur' => $transporteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transporteur_show', methods: ['GET'])]
    public function show(Transporteur $transporteur): Response
    {
        return $this->render('transporteur/show.html.twig', [
            'transporteur' => $transporteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_transporteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Transporteur $transporteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TransporteurType::class, $transporteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_transporteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('transporteur/edit.html.twig', [
            'transporteur' => $transporteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transporteur_delete', methods: ['POST'])]
    public function delete(Request $request, Transporteur $transporteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transporteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($transporteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_transporteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
