<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/restaurant')]
class RestaurantController extends AbstractController
{
    #[Route('/', name: 'restaurant')]
    public function index(RestaurantRepository $restaurantRepository,
   
    ): Response
    {
     
        $restaurants = $restaurantRepository->findAll();
      
        // $nbAvailablePlaces = $restaurant->getNbAvailablePlaces();
        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurants
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
