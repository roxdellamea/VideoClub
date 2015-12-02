<?php

namespace VideoClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use VideoClubBundle\Entity\User;
use VideoClubBundle\Entity\PurchasePack;

class PackageMinController extends Controller
{
	public function indexAction()
	{
	    $em = $this->getDoctrine()->getManager();

	   	$packs = $em->getRepository('VideoClubBundle:PackageMin')->findAll();

	    return $this->render('VideoClubBundle:PackageMin:index.html.twig', array('packs' => $packs));
	    	
	}

	public function buyAction($id)
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

		$packMin = $em->getRepository('VideoClubBundle:PackageMin')->find($id);

        if (!$packMin) {
            throw $this->createNotFoundException('Unable to find PackageMin entity.');
        }

        $purchasePack = new PurchasePack();
        $purchasePack->setUser($user);
        $purchasePack->setPackagemin($packMin);
        $purchasePack->setTotalcost($packMin->getCost());

        $min = $packMin->getMinutes();

        $user->setFreemin($user->getFreemin() + $min);


        $em->persist($purchasePack);
        $em->persist($user);
        $em->flush();

        return $this->render('VideoClubBundle:Movie:index.html.twig');
    }
}


  