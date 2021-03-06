<?php

namespace Jason\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jason\UsersBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;

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
	
	public function getbynameAction(Request $request)
	{
		$users = new Users();
		
		$form = $this->createFormBuilder($users)
					 ->add('name', 'text')
					 ->getForm();
					 
		return $this->render('JasonUsersBundle:Default:getbyname.html.twig',
							array('form' => $form->createView())
		);
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
		$repo = $this->getDoctrine()
					 ->getRepository('JasonUsersBundle:Users');
	 	
		$q = $repo->createQueryBuilder('l')
				  ->where('l.state LIKE :a')
				  ->setParameter('a', 'A%')
				  ->orwhere('l.state LIKE :i')
				  ->setParameter('i', 'I%')
				  ->orderBy('l.name', 'DESC')
				  ->setMaxResults(7)
				  ->getQuery();
				  
	  	$locales = $q->getResult();	
		
		return $this->render('JasonUsersBundle:Default:getbylocale.html.twig',
							array('locales' => $locales)
		);
	}
}