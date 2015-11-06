<?php

namespace VideoClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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

	public function viewAction($val)
    {
       	$repository = $this->getDoctrine()->getRepository('VideoClubBundle:Movie');

    	$movie = $repository->find($val);

    	
    	
 		return new Response('Titulo:' . $movie->getTitle() . ' Genero: ' . $movie->getGender() . '<br />' );
    	
	}
}
