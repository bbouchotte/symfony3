<?php

namespace SymfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SymfonyController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        return $this->render('SymfonyBundle:Default:index.html.twig');
    }
    
    /**
     * @Route("/nav", name="nav")
     */
    public function navAction()
    {
    	return $this->render('SymfonyBundle:Default:nav.html.twig');
    }
}
