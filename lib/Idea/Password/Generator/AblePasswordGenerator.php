<?php

/** @see Able_Generator_Password */
require_once 'Able/Generator/Password.php';

class Idea_Password_Generator_AblePasswordGenerator
	extends Idea_Password_Generator_Adapter
{

	/** @var Able_Generator_Password */
	protected $_generator;

	public function __construct($options)
	{

		$this->_generator = new Able_Generator_Password($options);

	}

	/**
	 * (non-PHPdoc)
	 * @see Idea_Password_Generator::generate()
	 */
	public function generate()
	{

		return $this->_generator->generate();

	}

}