<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SecurityController extends Controller
{
    /**
     * @Route("/security", name="security")
     */
    public function securityAction()
    {
        return $this->render('BookBundle:Security:security.html.twig');
    }
    
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {

    	return $this->render('BookBundle:Security:admin.html.twig');
    }
}
