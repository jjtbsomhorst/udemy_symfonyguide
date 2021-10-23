<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Repository\DishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dish', name: 'dish.')]
class DishController extends AbstractController
{
    #[Route('/', name: 'dish')]
    public function index(DishRepository $rep): Response
    {
        $dishes = $rep->findAll();



        return $this->render('dish/index.html.twig', [
            'controller_name' => 'DishController',
            'dishes' => $dishes
        ]);
    }

    #[Route('/create', name: 'createdish')]
    public function create(Request $req){
        $d = new Dish();
        $d->setName('P');
        $d->setDescription("de");

        $em = $this->getDoctrine()->getManager();
        $em->persist($d);
        $em->flush();

        return new Response('created');
    }


}
