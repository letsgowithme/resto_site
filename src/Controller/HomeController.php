<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/legal_notice', name: 'footer.legal_notice', methods: ['GET'])]
    public function legalNotice(
      
    ): Response
    {
        return $this->render('footer/legal_notice.html.twig');
    }
    #[Route('/privacy', name: 'footer.privacy_policy', methods: ['GET'])]
    public function privacy(
       
    ): Response
    {
        return $this->render('footer/privacy_policy.html.twig');
    }
}
