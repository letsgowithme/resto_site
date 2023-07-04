<?php

namespace App\Controller;

use App\Repository\PlacesRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlacesController extends AbstractController
{
    #[Route('/places', name: 'app_places')]
    public function index(
        PlacesRepository $placesRepository,
        ReservationRepository $reservationRepository
        ): Response
    {
        $nbTotalPlaces = 44;
        $reservations = $reservationRepository->findAll();
        $reserv_by_date = $reservationRepository->findBy(['date' => getDate()]);
        if($reserv_by_date) {
            $busyPlaces = $reserv_by_date->findBy(['nbPeople' => getNbPeople()]);
        }
        
        $places = $placesRepository->findAll();
       
       
        return $this->render('places/index.html.twig', [
            'places' => $places,

        ]);
    }
}
