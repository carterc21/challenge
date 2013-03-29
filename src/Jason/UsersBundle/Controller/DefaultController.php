<?php

namespace Jason\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JasonUsersBundle:Default:index.html.twig');
    }
	
	public function getallAction()
	{
		return $this->render('JasonUsersBundle:Default:getall.html.twig');
	}
	
	public function getbynameAction()
	{
		return $this->render('JasonUsersBundle:Default:getbyname.html.twig');
	}
	
	public function getuserdetail($id)
	{
		return $this->render('JasonUsersBundle:Default:getuserdetail.html.twig');
	}
	
	public function getbylocaleAction()
	{
		return $this->render('JasonUsersBundle:Default:getbylocale.html.twig');
	}
}