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
}