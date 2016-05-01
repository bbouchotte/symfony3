<?php

namespace CookbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/security", name="cookbook_security")
     */
    public function cookbook_securityAction()
    {
        return $this->render('CookbookBundle:Security:index.html.twig');
    }
    
    /**
     * @Route("/loginForm", name="cookbook_loginForm")
     */
    public function cookbook_loginForm() {
    	return $this->render('CookbookBundle:Security:loginForm.html.twig');
    }
    
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request) {
    	$authenticationUtils = $this->get('security.authentication_utils');
    	
    	// get the login error if there is one
    	$error = $authenticationUtils->getLastAuthenticationError();
    	
    	// last username entered by the user
    	$lastUsername = $authenticationUtils->getLastUsername();
    	
    	return $this->render(
    		'security/login.html.twig',
    		array(
    			// last username entered by the user
    			'last_username' => $lastUsername,
    			'error'         => $error,
    		)
    	);
    }
}
