<?php

namespace App\Controller;

use App\Form\BookType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{
    #[Route('/book/new', name:'new_book')]
public function new (Request $request, EntityManagerInterface $objectManager): Response {

    $form = $this->createForm(BookType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $book = $form->getData();

      $objectManager->persist($book);
      $objectManager->flush();

      return $this->redirectToRoute('new_book');
    }

    return $this->render('book/new.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
