<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Form\DishType;
use App\Repository\DishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/plats')]
class DishController extends AbstractController
{
    #[Route('/', name: 'dish.index', methods: ['GET'])]
    public function index(DishRepository $dishRepository): Response
    {
        $dishes = $dishRepository->findAll();
        
        return $this->render('dish/index.html.twig', [
            'dishes' => $dishes,
        ]);
    }

    /**
     * @param Dish $dish
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/new', name: 'dish.new', methods: ['GET', 'POST'])]
    public function new(Request $request, DishRepository $dishRepository, EntityManagerInterface $manager, $id): Response
    {
        $dish = new Dish();
        $form = $this->createForm(DishType::class, $dish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $dishRepository->save($dish, true);
            $dish = $form->getData();
            // $dish->addCategory($this->getCategories());
            // $dish->addCategory($id);
            $manager->persist($dish);
            $manager->flush();
            $this->addFlash( 
                'success',
                'Votre recette a bien été créé'
            );
            return $this->redirectToRoute('dish.index');
        }

        return $this->render('dish/new.html.twig', [
            'dish' => $dish,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'dish.show', methods: ['GET'])]
    public function show(Dish $dish): Response
    {
        return $this->render('dish/show.html.twig', [
            'dish' => $dish,
        ]);
    }

    #[Route('/{id}/edit', name: 'dish.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dish $dish, DishRepository $dishRepository): Response
    {
        $form = $this->createForm(DishType::class, $dish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dishRepository->save($dish, true);

            return $this->redirectToRoute('dish.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dish/edit.html.twig', [
            'dish' => $dish,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'dish.delete', methods: ['POST'])]
    public function delete(Request $request, Dish $dish, DishRepository $dishRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dish->getId(), $request->request->get('_token'))) {
            $dishRepository->remove($dish, true);
        }

        return $this->redirectToRoute('dish.index', [], Response::HTTP_SEE_OTHER);
    }
}
