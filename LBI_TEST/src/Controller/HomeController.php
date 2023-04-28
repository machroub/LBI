<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request, UserRepository $user): Response
    {
        if($request->isMethod('POST')){
            dd($request->isMethod('GET'));
        }


         return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'user'=> $user
        ]);
    }


    #[Route('/result', name: 'result')]
    public function result(Request $request): Response
    {
        if($request->isMethod('POST')){
            dd($request->isMethod('GET'));
        }


         return $this->render('home/resylt.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
