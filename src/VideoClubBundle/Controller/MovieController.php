<?php

namespace VideoClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use VideoClubBundle\Entity\Movie;
use VideoClubBundle\Form\MovieType;

class MovieController extends Controller
{
    public function indexAction()
    {
        return $this->render('VideoClubBundle:Movie:index.html.twig');
    }

    public function listAction($val)
    {
       	$em = $this->getDoctrine()->getManager();

    	$movies = $em->getRepository('VideoClubBundle:Movie')->findByGender($val);

    	return $this->render('VideoClubBundle:Movie:list.html.twig', array('movies' => $movies));
    	
	}

    public function addAction()
    {
        $movie = new Movie();
        $form = $this->createCreateForm($movie);

        return $this->render('VideoClubBundle:Movie:add.html.twig', array('form' => $form->createView()));
    }

    private function createCreateForm(Movie $entity)
    {
        $form = $this->createForm(new MovieType(), $entity, array('action' => $this->generateUrl('vc_movie_create'), 'method' => 'POST'));
        return $form;
    }
	
    public function createAction(Request $request)
    {
        $movie = new Movie();
        $form = $this->createCreateForm($movie);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            return $this->redirectToRoute('vc_movie_add');
        }
        return $this->render('VideoClubBundle:Movie:add.html.twig', array('form' => $form->createView()));
    }
}
