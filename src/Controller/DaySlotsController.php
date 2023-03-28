<?php

namespace App\Controller;

use App\Entity\DaySlots;
use App\Form\DaySlotsType;
use App\Repository\DaySlotsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/day_slots')]
class DaySlotsController extends AbstractController
{
    #[Route('/', name: 'day_slots.index', methods: ['GET'])]
    public function index(DaySlotsRepository $daySlotsRepository): Response
    {
        return $this->render('day_slots/index.html.twig', [
            'day_slots' => $daySlotsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'day_slots.new', methods: ['GET', 'POST'])]
    public function new(Request $request, DaySlotsRepository $daySlotsRepository): Response
    {
        $daySlot = new DaySlots();
        $form = $this->createForm(DaySlotsType::class, $daySlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $daySlotsRepository->save($daySlot, true);

            return $this->redirectToRoute('day_slots.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('day_slots/new.html.twig', [
            'day_slot' => $daySlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_day_slots_show', methods: ['GET'])]
    public function show(DaySlots $daySlot): Response
    {
        return $this->render('day_slots/show.html.twig', [
            'day_slot' => $daySlot,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_day_slots_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DaySlots $daySlot, DaySlotsRepository $daySlotsRepository): Response
    {
        $form = $this->createForm(DaySlotsType::class, $daySlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $daySlotsRepository->save($daySlot, true);

            return $this->redirectToRoute('day_slots.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('day_slots/edit.html.twig', [
            'day_slot' => $daySlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_day_slots_delete', methods: ['POST'])]
    public function delete(Request $request, DaySlots $daySlot, DaySlotsRepository $daySlotsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$daySlot->getId(), $request->request->get('_token'))) {
            $daySlotsRepository->remove($daySlot, true);
        }

        return $this->redirectToRoute('day_slots.index', [], Response::HTTP_SEE_OTHER);
    }
}
