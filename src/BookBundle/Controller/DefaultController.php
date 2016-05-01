<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="book")
     */
    public function bookAction()
    {
        return $this->render('BookBundle:Default:index.html.twig');
    }
}
