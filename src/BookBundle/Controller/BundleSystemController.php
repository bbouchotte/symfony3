<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BundleSystemController extends Controller
{
    /**
     * @Route("/bundleSystem", name="bundleSystem")
     */
    public function bundleSystemAction()
    {
        return $this->render('BookBundle:BundleSystem:bundleSystem.html.twig');
    }
}
