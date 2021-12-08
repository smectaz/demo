<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;

class HelloController extends AbstractController
{
    #[Route('/autre/{name}', methods:['GET'], requirements:['name' => '[a-z]+'], name:'hello')]
    
public function index(string $name): Response
    {

    dump($this->generateUrl(
        'hello',
        ['name' => 'random', 'more' => 'kkk'],
        UrlGenerator::ABSOLUTE_URL
    ));

    return $this->render('hello/index.html.twig', [
        'name' => $name,
        'key' => 'first',
        'articles' => [
            'title' => 'sample',
        ],
        'student' => [
            'firstname' => 'cedric',
            'lastname' => $name,
        ],
        'date' => new \DateTime(),
    ]);
}
}
