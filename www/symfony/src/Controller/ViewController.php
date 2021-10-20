<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    #[Route('/view', name: 'view')]
    public function index(): Response
    {
        $day = Date('l');
        $user = [
            'name' => 'udemy',
            'lastname' => 'udemy',
            'alter'=>'99'
        ];
        return $this->render('view/index.html.twig', [
            'd' => $day,
            'user'=>$user
        ]);
    }
}
