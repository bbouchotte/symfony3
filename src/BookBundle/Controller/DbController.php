<?php

namespace BookBundle\Controller;

use BookBundle\Entity\Db\Product;
use BookBundle\Entity\Db\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DbController extends Controller
{
	
    /**
     * @Route("/db", name="db")
     */
    public function dbAction()
    {
        return $this->render('BookBundle:Db:db.html.twig');
    }
    
    /**
     * @Route("/mysql", name="mysql")
     */
    public function MysqlAction() {
    	return $this->render('BookBundle:Db:mysql.html.twig');
    }
    
    /**
     * @Route("/firstPersisting", name="firstPersisting")
     */
    public function firstPersistingAction() {
    	
    	$em = $this->getDoctrine()->getManager();
    	$product = new Product;
    	$product->setName("Keyboard");
    	$product->setPrice(16.25);
    	$product->setDescription("To write things.");
    	// tells Doctrine you want to (eventually) save the Product (no queries yet):
    	$em->persist($product);
    	// actually executes the queries (i.e. the INSERT query):
    	$em->flush();
    	return $this->render('BookBundle:Db:firstPersisting.html.twig', array(
    		'product' => $product
    	));    	
    }
        
    /**
     * @Route("/showProduct/{id}"
     * , defaults={"id"=1}
     * , requirements={"id":"\d+"}
     * , name="showProduct"
     * )
     */
    public function showAction ($id) {
    	$product = $this->getDoctrine()
        ->getRepository('BookBundle:Db\Product')
        ->find($id);
    	// ou alors
    	$repository = $this->getDoctrine()->getRepository('BookBundle:Db\Product');
        
        if (!$product) {
        	throw $this->createNotFoundException('No product found for id '.$id);
        }
    	
        return $this->render('BookBundle:Db:showProduct.html.twig', array(
        	'product' => $product	
        ));
    }
    
    /**
     * @Route("/updateProduct/{id}"
     * , defaults={"id"=1}
     * , requirements={"id":"\d+"}
     * , name="updateProduct"
     * )
     */
    public function updateProductAction ($id) {
    	$repository = $this->getDoctrine()->getRepository('BookBundle:Db\Product');
    	$product = $repository->findOneById($id);
    	if (!$product) {
    		$this->createNotFoundException('No product found for id '.$id);
    	}
    	
    	$product->setName('Clavier en or!');
    	
    	$em = $this->getDoctrine()->getManager();
    	$em->flush();
    	return $this->render('BookBundle:Db:showProduct.html.twig', array(
    			'product' => $product
    	));
    }
    
    /**
     * @Route("/savingRelatedEntities", name="savingRelatedEntities") 
     */
    public function savingRelatedEntitiesAction() {
    	$category = new Category;
    	$category->setName("Articles de meilleure qualité");
    	
    	$product = new Product;
    	$product->setName("Savon sans savon");
    	$product->setPrice("122");
    	$product->setDescription("Fabriqué à base de savon");
    	
    	$product->setCategory($category);
    	
    	$em = $this->getDoctrine()->getManager();
    	$em->persist($product);
    	$em->persist($category);
    	$em->flush();
    	return new Response(
    		'Saved new product with id: '.$product->getId()
    		.' and new category with id: '.$category->getId()
    	);
    }
    
    
}
