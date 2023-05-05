<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;



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
    ReservationRepository $reservationRepository): Response
    {
        
            
       
        $reservation = new Reservation();
        
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        //  $user = $this->getUser();
        // $nbPeople = $this->getData();
        // $reservation->setNbPeople($nbPeople);
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

        return $this->render('reservation/new.html.twig', [
            // 'reservation' => $reservation,
            // 'form' => $form,
            'form' => $form->createView()
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
