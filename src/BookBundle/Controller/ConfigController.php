<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ConfigController extends Controller
{
    /**
     * @Route("/config", name="config")
     */
    public function configAction()
    {
        return $this->render('BookBundle:Config:config.html.twig');
    }
}
