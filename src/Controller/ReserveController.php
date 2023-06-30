<?php

namespace App\Controller;

use App\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reserve', name: 'app_reserve')]
class ReserveController extends AbstractController
{
    #[Route('/add{id}', name: 'add_reserve')]
   
    public function addReserve(Reservation $reservation,
    SessionInterface $session
    ): Response
    {
       
    }
}
