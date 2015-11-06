<?php

namespace VideoClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PackageMinController extends Controller
{
	public function indexAction()
	    {
	       	$em = $this->getDoctrine()->getManager();

	    	$packs = $em->getRepository('VideoClubBundle:PackageMin')->findAll();

	    	return $this->render('VideoClubBundle:PackageMin:index.html.twig', array('packs' => $packs));
	    	
		}
}