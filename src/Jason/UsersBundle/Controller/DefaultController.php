<?php

namespace Jason\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JasonUsersBundle:Default:index.html.twig', array('name' => $name));
    }
}
