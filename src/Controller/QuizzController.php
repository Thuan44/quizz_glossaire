<?php

namespace App\Controller;

use App\Entity\Expressions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuizzController extends AbstractController
{
    /**
     * @Route("/quizz", name="quizz")
     */
    public function index(): Response
    {
        return $this->render('quizz/index.html.twig', [
            'controller_name' => 'QuizzController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        // $repo = $this->getDoctrine()->getRepository(Expressions::class);

        $expressions = $this->getDoctrine()->getRepository(Expressions::class)->findAll();
        shuffle($expressions);
        $singleExpression = $expressions[0]; 

        return $this->render('quizz/home.html.twig', [
            'singleExpression' => $singleExpression
        ]);
    }

    /**
     * @Route("/expressions", name="expressions")
     */
    public function expressions(Request $request, EntityManagerInterface $manager)
    {
        $expressions = $this->getDoctrine()->getRepository(Expressions::class)->findAll();
        $expression = new Expressions();

        $form = $this->createFormBuilder($expression)
            ->add('name', null, ['label' => false])
            ->add('definition', null, ['label' => false])
            ->getForm();

        $form->handleRequest($request); // Check if request is ok

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($expression);
            $manager->flush(); // Send request to database

            echo("Expression enregistrée !");

        }

        return $this->render('quizz/expressions.html.twig', [
            'expressionForm' => $form->createView(),
            'expressionList' => $expressions
        ]);
    }
}
