<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/bonjour/{name}', name:'hello')]
function index(string $name): Response
    {
    dump($name);
    return $this->render('hello/index.html.twig', [
        'controller_name' => 'HelloController',
    ]);
}
}