<?php

namespace App\Controller;

use App\Entity\EveningSlot;
use App\Form\EveningSlotType;
use App\Repository\EveningSlotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/evening/slots')]
class EveningSlotController extends AbstractController
{
    #[Route('/', name: 'app_evening_slot_index', methods: ['GET'])]
    public function index(EveningSlotRepository $eveningSlotRepository): Response
    {
        return $this->render('evening_slot/index.html.twig', [
            'evening_slots' => $eveningSlotRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_evening_slot_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EveningSlotRepository $eveningSlotRepository): Response
    {
        $eveningSlot = new EveningSlot();
        $form = $this->createForm(EveningSlotType::class, $eveningSlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eveningSlotRepository->save($eveningSlot, true);

            return $this->redirectToRoute('app_evening_slot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evening_slot/new.html.twig', [
            'evening_slot' => $eveningSlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evening_slot_show', methods: ['GET'])]
    public function show(EveningSlot $eveningSlot): Response
    {
        return $this->render('evening_slot/show.html.twig', [
            'evening_slot' => $eveningSlot,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_evening_slot_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EveningSlot $eveningSlot, EveningSlotRepository $eveningSlotRepository): Response
    {
        $form = $this->createForm(EveningSlotType::class, $eveningSlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eveningSlotRepository->save($eveningSlot, true);

            return $this->redirectToRoute('app_evening_slot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evening_slot/edit.html.twig', [
            'evening_slot' => $eveningSlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evening_slot_delete', methods: ['POST'])]
    public function delete(Request $request, EveningSlot $eveningSlot, EveningSlotRepository $eveningSlotRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eveningSlot->getId(), $request->request->get('_token'))) {
            $eveningSlotRepository->remove($eveningSlot, true);
        }

        return $this->redirectToRoute('app_evening_slot_index', [], Response::HTTP_SEE_OTHER);
    }
}
