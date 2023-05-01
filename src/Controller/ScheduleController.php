<?php

namespace App\Controller;

use App\Entity\Schedule;
use App\Form\ScheduleType;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;



#[Route('/schedule')]
class ScheduleController extends AbstractController
{
     /**
     * This function shows the schedule
     *  @param ScheduleRepository $scheduleRepository
     * @param Request $request
     * @return Response
     */
    #[Route('/', name: 'schedule.index', methods: ['GET'])]
   
    public function index(ScheduleRepository $scheduleRepository): Response
    {
        
        
            return $this->render('schedule/index.html.twig', [
                'schedules' => $scheduleRepository->findAll(),
            ]);
        
    }
    /**
     * This function shows the schedule
     *  @param ScheduleRepository $scheduleRepository
     * @param Request $request
     * @return Response
     */
    #[Route('/', name: 'schedule.index_day', methods: ['GET'])]
   
    public function index_day(ScheduleRepository $scheduleRepository): Response
    {
        
        
            return $this->render('schedule/index_day.html.twig', [
                'schedules' => $scheduleRepository->findAll(),
            ]);
        
    }
    // /**
    //  * This function shows the schedule
    //  *  @param ScheduleRepository $scheduleRepository
    //  * @param Request $request
    //  * @return Response
    //  */
    // #[Route('/line', name: 'partials._schedule_line', methods: ['GET'])]
   
    // public function line_index(ScheduleRepository $scheduleRepository): Response
    // {
        
    //          $schedules = $scheduleRepository->findBy(['day'=> $this->getDay()]);
    //         return $this->render('partials/_schedule_line.html.twig');
        
    // }
    //  /**
    //  * This function shows the schedule
    //  *  @param ScheduleRepository $scheduleRepository
    //  * @param Request $request
    //  * @return Response
    //  */
    // #[Route('/line', name: 'schedule.line_index', methods: ['GET'])]
   
    // public function line_index(ScheduleRepository $scheduleRepository): Response
    // {
        

    //         $schedule = $scheduleRepository->findOneByDay(7);
    //         return $this->render('schedule/line_index.html.twig', [
    //                 'schedule' => $schedule
    //         ]);
            
        
    // }
      
    /**
     * This function creates the schedule
     * @param Schedule $schedule
     *  @param ScheduleRepository $scheduleRepository
     * @param Request $request
     * @return Response
     */
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/new', name: 'schedule.new', methods: ['GET', 'POST'])]
    public function new(Request $request, ScheduleRepository $scheduleRepository): Response
    {
        $schedule = new Schedule();
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scheduleRepository->save($schedule, true);

            return $this->redirectToRoute('schedule.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('schedule/new.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
        ]);
    }
    // #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}', name: 'schedule.show', methods: ['GET'])]
    public function show(Schedule $schedule): Response
    {
        return $this->render('schedule/show.html.twig', [
            'schedule' => $schedule,
            
        ]);
    }
    #[Route('/{day}', name: 'schedule.show_day', methods: ['GET'])]
    public function show_day(Schedule $schedule, ScheduleRepository $scheduleRepository, $day): Response
    {
        // $day = $this->getDay();
        $schedule = $scheduleRepository->findBy([$day,
        $orderBy = 'ASC']);
        return $this->render('schedule/show.html.twig', [
            'schedule' => $schedule,
            'day' => $day,
            
        ]);
    }

    /**
     * This function edits the schedule
     * @param Schedule $schedule
     * @param Request $request
     * @return Response
     */
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/edit/{id}', name: 'schedule.edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request, 
        Schedule $schedule, 
        ScheduleRepository $scheduleRepository
        ): Response
    {
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scheduleRepository->save($schedule, true);

            return $this->redirectToRoute('schedule.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('schedule/edit.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
        ]);
    }

     /**
     * This function deletes the schedule
     * @param Schedule $schedule
     * @param Request $request
     * @param ScheduleRepository $scheduleRepository
     * @return Response
     */
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/delete', name: 'app_schedule_delete', methods: ['POST'])]
    public function delete(Request $request, Schedule $schedule, ScheduleRepository $scheduleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schedule->getId(), $request->request->get('_token'))) {
            $scheduleRepository->remove($schedule, true);
        }

        return $this->redirectToRoute('schedule.index', [], Response::HTTP_SEE_OTHER);
    }
}
