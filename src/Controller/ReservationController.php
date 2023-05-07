<?php

namespace App\Controller;

use App\Entity\Allergy;
use App\Entity\Reservation;
use App\Entity\User;
use App\Form\ReservationType;
use App\Repository\AllergyRepository;
use App\Repository\DaySlotRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



#[Route('/reservation')]
class ReservationController extends AbstractController
{
    // #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'reservation.index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();
        
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations,
        ]);
      
    }
   /**
    * This function creates a reservation
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */

    #[Route('/new', name: 'reservation.new', methods: ['GET', 'POST'])]
    public function new(Request $request,
    EntityManagerInterface $manager,
    ReservationRepository $reservationRepository,
    DaySlotRepository $daySlotRepository,
    UserInterface $user,
    AllergyRepository $allergyRepository,
    // Allergy $allergy,
    AuthenticationUtils $authenticationUtils
    ): Response
    {    
        $reservation = new Reservation();
       
        if($user) {
            $user = $reservation->getUser();
            $allergies = $allergyRepository->findAll();
            $reservation->setNbPeople($this->getUser()->getNbPeople());
            $reservation->setFullname($this->getUser()->getFullname());
        //    if($allergies) {
            for($i=0;$i<count($allergies); $i++){
                  $reservation->addAllergy($allergies[$i]);
           }
            // }
            
        }
        
       
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $reservationRepository->save($reservation, true);
            $reservation = $form->getData();
            // $manager->persist($daySlots);
            $manager->persist($reservation);
            
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre reservation a bien été créé'
            );

            return $this->redirectToRoute('menu.index', [], Response::HTTP_SEE_OTHER);
        }
       
        return $this->render('reservation/new.html.twig', [
          'form' => $form->createView(),
          $daySlots = $daySlotRepository->findAvailableDaySlots(20),
          'daySlots' =>  $daySlots
        //   'nbPeople' => $nbPeople,
      ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/{id}', name: 'reservation.show', methods: ['GET'])]
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }
    #[IsGranted('ROLE_USER')]
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
