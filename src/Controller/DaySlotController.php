<?php

namespace App\Controller;

use App\Repository\DaySlotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
   }
