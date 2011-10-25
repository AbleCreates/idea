<?php

class Idea_Password_Salt_Generator_AbleRandomString
	extends Idea_Password_Salt_Generator_Adapter
{

	/** @var Able_Generator_RandomString */
	protected $_generator;

	public function __construct($length)
	{

		$this->_generator = new Able_Generator_RandomString($length);

	}

	/**
	 * (non-PHPdoc)
	 * @see Idea_Password_Salt_Generator::generate()
	 */
	public function generate()
	{

		return $this->_generator->generate();

	}

}
