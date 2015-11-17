<?php

namespace VideoClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use VideoClubBundle\Entity\User;
use VideoClubBundle\Form\UserType;

class UserController extends Controller
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
        $user = new User();
        $form = $this->createCreateForm($user);

        return $this->render('VideoClubBundle:User:add.html.twig', array('form' => $form->createView()));
    }

    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array('action' => $this->generateUrl('vc_user_create'), 'method' => 'POST'));
        return $form;
    }
	
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createCreateForm($user);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $password = $form->get('password')->getData();

            $encoder = $this->container->get('security.password_encoder');
            $encode = $encoder->encodePassword($user, $password);

            $user->setPassword($encode);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('vc_user_add');
        }
        return $this->render('VideoClubBundle:User:add.html.twig', array('form' => $form->createView()));
    }
}
