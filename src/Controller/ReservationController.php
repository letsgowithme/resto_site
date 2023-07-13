<?php

namespace App\Controller;


use App\Entity\Reservation;
use App\Entity\Restaurant;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/reservation')]
class ReservationController extends AbstractController
{
    // #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'reservation.index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository,
    ScheduleRepository $scheduleRepository
    ): Response
    {
        $reservations = $reservationRepository->findAll();
        $schedules = $scheduleRepository->findAll(); 
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations,
            'schedules' => $schedules,
        ]);
      
    }
/**
    * This function creates a reservation of a user
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */

     #[Route('/user_new', name: 'reservation.user_new', methods: ['GET', 'POST'])]
     public function user_new(Request $request,
     EntityManagerInterface $manager,
    //  DaySlotRepository $daySlotRepository,
     ScheduleRepository $scheduleRepository,
     UserInterface $user,
     ): Response
     {    
         $reservation = new Reservation();
        //  $daySlots = $daySlotRepository->findAvailableDaySlots(18);
         $schedules = $scheduleRepository->findAll(); 
 
         if($user) {
             $user = $reservation->getUser();
             if ($this->getUser()->getNbPeople()) {
                $reservation->setNbPeople($this->getUser()->getNbPeople());
             }
             
             $reservation->setNbChildren($this->getUser()->getNbChildren());
             $reservation->setFullname($this->getUser()->getFullname());
             $allergies = $this->getUser()->getAllergies(); 
              for($i=0; $i< count($allergies); $i++){
                   $reservation->addAllergy($allergies[$i]);
                 }
            }
         $form = $this->createForm(ReservationType::class, $reservation);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             // $reservationRepository->save($reservation, true);
             $reservation = $form->getData();
             $manager->persist($reservation);
             $manager->flush();
             $this->addFlash(
                 'success',
                 'Votre reservation a bien été créé'
             );
             return $this->redirectToRoute('menu.index', [], Response::HTTP_SEE_OTHER);
         }
        
         return $this->render('reservation/user_new.html.twig', [
           'form' => $form->createView(),
           'schedules' => $schedules,
         
       ]);
     }
   /**
    * This function creates a reservation
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */

    #[Route('/new', name: 'reservation.new_js', methods: ['GET', 'POST'])]
    public function new(Request $request,
    EntityManagerInterface $manager,
    ScheduleRepository $scheduleRepository,
    ReservationRepository $reservationRepository,
   
    ): Response
    {  
        $schedules = $scheduleRepository->findAll(); 
        $reservation = new Reservation();
        $res_date =  $reservationRepository->findBy(['date' => getDate()]);
        $reservations = $reservationRepository->findAll();
        $resNbPeople = $reservation->getNbPeople();
     
        $totalPlaces = 44;
        $busyPlaces = null;
        $availablePlaces = null;
        if ($res_date) {
            for($i = 0; $i < count($reservations); $i++){
                $busyPlaces = $resNbPeople;
            //     $availablePlaces = $totalPlaces - $busyPlaces;
           
           
        }
    }
        
        
        

        // $res_date = $reservationRepository->(['date' => $reservation->getDate()]);
    
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $reservation = $form->getData();
            $manager->persist($reservation);
            $manager->flush();
            $this->addFlash(
                'success',
                'Votre reservation a bien été créé'
            );
            return $this->redirectToRoute('menu.index', [], Response::HTTP_SEE_OTHER);
        }
       
        return $this->render('reservation/new_js.html.twig', [
          'form' => $form->createView(),
          'reservation' => $reservation,
          'reservations' => $reservations,
          'schedules' => $schedules,
          'busyPlaces' => $busyPlaces,
          'availablePlaces' => $availablePlaces,
          'totalPlaces' => $totalPlaces,
          'res_date' => $res_date
          
      ]);
    }

    // #[IsGranted('ROLE_USER')]
    #[Route('/{id}', name: 'reservation.show', methods: ['GET'])]
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }
    // #[IsGranted('ROLE_USER')]
    #[Route('/{id}/edit', name: 'reservation.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, ReservationRepository $reservationRepository): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationRepository->save($reservation, true);

            return $this->redirectToRoute('reservation.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }
    #[IsGranted('ROLE_USER')]
    #[Route('/{id}', name: 'reservation.delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, ReservationRepository $reservationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $reservationRepository->remove($reservation, true);
        }

        return $this->redirectToRoute('reservation.index', [], Response::HTTP_SEE_OTHER);
    }
}
