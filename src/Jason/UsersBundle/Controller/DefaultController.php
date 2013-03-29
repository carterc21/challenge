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
		$repo = $this->getDoctrine()
                      ->getRepository('JasonUsersBundle:Users');
        $q = $repo->createQueryBuilder('u')
                  ->orderBy('u.name')
                  ->getQuery();
        $users = $q->getResult();
        
        
    	return $this->render('JasonUsersBundle:Default:getall.html.twig',
                            array('users' => $users)
        );
		
		return $this->render('JasonUsersBundle:Default:getall.html.twig');
	}
	
	public function getbynameAction()
	{
		return $this->render('JasonUsersBundle:Default:getbyname.html.twig');
	}
	
	public function getuserdetailAction($id)
	{
		$repo = $this->getDoctrine()
					 ->getRepository('JasonUsersBundle:Users');
					 
	 	$user = $repo->findOneById($id);
		
		if (count($user) == 1) {
			return $this->render('JasonUsersBundle:Default:getuserdetail.html.twig',
								array('user' => $user)
			);
		} else {
			return $this->render('JasonUsersBundle:Default:getuserdetail.html.twig',
								array('error' => 'No matching users found.')
			);
		}
		
		
	}
	
	public function getbylocaleAction()
	{
		return $this->render('JasonUsersBundle:Default:getbylocale.html.twig');
	}
}