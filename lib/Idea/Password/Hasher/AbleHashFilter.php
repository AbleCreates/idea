<?php

/** @see Able_Filter_Hash */
require_once 'Able/Filter/Hash.php';

class Idea_Password_Hasher_AbleHashFilter
	extends Idea_Password_Hasher_Adapter
{

	/** @var Able_Filter_Hash */
	protected $_filter;

	public function __construct()
	{

		$this->_filter = new Able_Filter_Hash();

	}

	public function hash($value)
	{

		return $this->_filter->filter($value);

	}

}