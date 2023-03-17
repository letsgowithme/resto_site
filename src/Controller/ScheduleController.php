<?php

namespace App\Controller;

use App\Entity\Schedule;
use App\Form\ScheduleType;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



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
        $schedules = $scheduleRepository->findAll();
        return $this->render('schedule/index.html.twig', [
            'schedules' => $schedules,
        ]);
    }
  
    /**
     * This function creates the schedule
     * @param Schedule $schedule
     *  @param ScheduleRepository $scheduleRepository
     * @param Request $request
     * @return Response
     */
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

    #[Route('/{id}', name: 'schedule.show', methods: ['GET'])]
    public function show(Schedule $schedule): Response
    {
        return $this->render('schedule/show.html.twig', [
            'schedule' => $schedule,
        ]);
    }

    /**
     * This function edits the schedule
     * @param Schedule $schedule
     * @param Request $request
     * @return Response
     */
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
    #[Route('/delete', name: 'app_schedule_delete', methods: ['POST'])]
    public function delete(Request $request, Schedule $schedule, ScheduleRepository $scheduleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schedule->getId(), $request->request->get('_token'))) {
            $scheduleRepository->remove($schedule, true);
        }

        return $this->redirectToRoute('schedule.index', [], Response::HTTP_SEE_OTHER);
    }
}
