<?php

namespace CookbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="cookbook")
     */
    public function cookbookAction()
    {
        return $this->render('CookbookBundle:Default:index.html.twig');
    }
}
