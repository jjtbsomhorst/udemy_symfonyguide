<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'article')]
    public function index(Request $request): Response
    {

        $a = new Article();
        $a->setTitel('blala');

        $em = $this->getDoctrine()->getManager();
//        $em->persist($a);
//        $em->flush($a);
        $getArtikel = $em->getRepository(Article::class)->findOneBy(
            ['id'=>1]
        );
        $em->remove($getArtikel);
        $em->flush();
                return $this->render('article/index.html.twig', [
            'article' => $getArtikel,
        ]);

    }
}
