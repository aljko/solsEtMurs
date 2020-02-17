<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index() :Response
    {
        return $this->render('Home/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }
}
