<?php 

namespace BookBundle\Entity\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Author
{
	/**
	 * @Assert\NotBlank()
	 */
	public $name;
	
}