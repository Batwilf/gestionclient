<?php

namespace GC\FactureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GC\UserBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	// $manager = $this->getDoctrine()->getManager();

    	// $user = new User;

    	// $user->setUsername("client2");

    	// $user->setPassword("pass2");

    	// $user->setSalt("");

    	// $user->setRoles(array("ROLE_CLIENT"));

    	// $manager->persist($user);

    	// $manager->flush();

        return $this->render('GCFactureBundle:Default:index.html.twig');
    }
}
