<?php

namespace VideoClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use VideoClubBundle\Entity\Movie;
use VideoClubBundle\Entity\Rental;
use VideoClubBundle\Entity\User;
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

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $sesion = $request->getSession();

        $fosUser = $this->get('security.context')->getToken()->getUser();
        if ($fosUser != 'anon.') {
            $user = $em->getRepository('VideoClubBundle:User')->find($fosUser->getId());
        } else {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $movie = $em->getRepository('VideoClubBundle:Movie')->find($id);

        if (!$movie) {
            throw $this->createNotFoundException('Unable to find Movie entity.');
        }

        if ($user->getFreemin() >= $movie->getRuntime()) {
            $rental = new Rental();
            $rental->setUser($user);
            $rental->setMovie($movie);
            $user->setFreemin($user->getFreemin() - $movie->getRuntime());
            $em->persist($rental);
            $em->persist($user);
            $em->flush();
            return $this->render('VideoClubBundle:Movie:show.html.twig', array('movie' => $movie));
        }else{
            return $this->render('VideoClubBundle:Movie:msn.html.twig');
        }
    }
}