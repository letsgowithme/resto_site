<?php

namespace App\Controller;

use App\Entity\EveningSlots;
use App\Form\EveningSlotsType;
use App\Repository\EveningSlotsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/evening/slots')]
class EveningSlotsController extends AbstractController
{
    #[Route('/', name: 'app_evening_slots_index', methods: ['GET'])]
    public function index(EveningSlotsRepository $eveningSlotsRepository): Response
    {
        return $this->render('evening_slots/index.html.twig', [
            'evening_slots' => $eveningSlotsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_evening_slots_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EveningSlotsRepository $eveningSlotsRepository): Response
    {
        $eveningSlot = new EveningSlots();
        $form = $this->createForm(EveningSlotsType::class, $eveningSlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eveningSlotsRepository->save($eveningSlot, true);

            return $this->redirectToRoute('app_evening_slots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evening_slots/new.html.twig', [
            'evening_slot' => $eveningSlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evening_slots_show', methods: ['GET'])]
    public function show(EveningSlots $eveningSlot): Response
    {
        return $this->render('evening_slots/show.html.twig', [
            'evening_slot' => $eveningSlot,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_evening_slots_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EveningSlots $eveningSlot, EveningSlotsRepository $eveningSlotsRepository): Response
    {
        $form = $this->createForm(EveningSlotsType::class, $eveningSlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eveningSlotsRepository->save($eveningSlot, true);

            return $this->redirectToRoute('app_evening_slots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evening_slots/edit.html.twig', [
            'evening_slot' => $eveningSlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evening_slots_delete', methods: ['POST'])]
    public function delete(Request $request, EveningSlots $eveningSlot, EveningSlotsRepository $eveningSlotsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eveningSlot->getId(), $request->request->get('_token'))) {
            $eveningSlotsRepository->remove($eveningSlot, true);
        }

        return $this->redirectToRoute('app_evening_slots_index', [], Response::HTTP_SEE_OTHER);
    }
}
