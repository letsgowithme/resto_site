<?php

namespace App\Controller;

use App\Entity\DaySlot;
use App\Form\DaySlotType;
use App\Repository\DaySlotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/day_slots')]
class DaySlotController extends AbstractController
{
    #[Route('/', name: 'day_slot.index', methods: ['GET'])]
    public function index(DaySlotRepository $daySlotRepository): Response
    {
        return $this->render('day_slot/index.html.twig', [
            'daySlots' => $daySlotRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'day_slot.new', methods: ['GET', 'POST'])]
    public function new(Request $request, DaySlotRepository $daySlotRepository): Response
    {
        $daySlot = new DaySlot();
        $form = $this->createForm(DaySlotType::class, $daySlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $daySlotRepository->save($daySlot, true);

            return $this->redirectToRoute('day_slot.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('day_slot/new.html.twig', [
            'daySlot' => $daySlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_day_slot_show', methods: ['GET'])]
    public function show(DaySlot $daySlot): Response
    {
        return $this->render('day_slot/show.html.twig', [
            'daySlot' => $daySlot,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_day_slot_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DaySlot $daySlot, DaySlotRepository $daySlotRepository): Response
    {
        $form = $this->createForm(DaySlotType::class, $daySlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $daySlotRepository->save($daySlot, true);

            return $this->redirectToRoute('day_slots.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('day_slot/edit.html.twig', [
            'daySlot' => $daySlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_day_slot_delete', methods: ['POST'])]
    public function delete(Request $request, DaySlot $daySlot, DaySlotRepository $daySlotRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$daySlot->getId(), $request->request->get('_token'))) {
            $daySlotRepository->remove($daySlot, true);
        }

        return $this->redirectToRoute('day_slot.index', [], Response::HTTP_SEE_OTHER);
    }
}
