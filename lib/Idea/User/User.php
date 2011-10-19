<?php

class Idea_User_User implements Idea_User
{

	protected $_username;

	protected $_password;

	public function __construct($username)
	{

		$this->_username = $username;

	}

	public function getUsername()
	{

		return $this->_username;

	}

	public function setPassword(Idea_Password $password)
	{

		$this->_password = $password;

	}

	public function getPassword()
	{

		return $this->_password;

	}

}