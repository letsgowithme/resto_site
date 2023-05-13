<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Restaurant;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/restaurant')]
class RestaurantController extends AbstractController
{
    #[Route('/', name: 'restaurant')]
    public function index(RestaurantRepository $restaurantRepository,
     ReservationRepository $reservationRepository,
     Reservation $reservation
   
    ): Response
    {
        $restaurants = $restaurantRepository->findAll();
        $reservations = $reservationRepository->findBy(['date' => getDate()]);
        $same_date_orders = $this->getReservation()->getDate();
        // $daySlot = $reservationRepository->findOneByDaySlot('daySlot');
        // $nbAvailablePlaces = $restaurant->getNbAvailablePlaces();
        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurants,
            // 'daySlot' => $daySlot,
        ]);
    }
    #[Route('/{id}', name: 'restaurant.show', methods: ['GET'])]
    public function show(Restaurant $restaurant,
    RestaurantRepository $restaurantRepository,
    // Reservation $reservation
    ): Response
    {
        
        // $nbPlaces = $reservation->getNbPeople();
        // $nbTotalPlaces = $restaurantRepository->getNbTotalPlaces();
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }
}
