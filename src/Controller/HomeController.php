<?php

namespace App\Controller;

use App\Repository\LivresRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]

    public function findAll(LivresRepository $rep): Response
    {
        $livres=$rep->findAll();

        return $this->render('home/findAll.html.twig',['livres'=>$livres]);
    }
}
