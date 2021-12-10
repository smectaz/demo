<?php

namespace App\Controller;

use App\Form\AuthorType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthorController extends AbstractController
{
    #[Route('/author/new', name:'new_author')]
public function new (Request $request, EntityManagerInterface $objectManager): Response {

    $form = $this->createForm(AuthorType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $author = $form->getData();

      $objectManager->persist($author);
      $objectManager->flush();

      return $this->redirectToRoute('new_author');
    }

    return $this->render('author/new.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
