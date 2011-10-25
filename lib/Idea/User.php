<?php

/**
 * represents a user
 *
 * @category   Idea
 * @package    Idea_User
 * @author     Chris Woodford <chris.woodford@gmail.com>
 */
interface Idea_User
{

	/**
	 *
	 * get a unique username
	 * @return string
	 */
	public function getUsername();

	/**
	 *
	 * set the password for this user
	 * @param Idea_Password $password
	 */
	public function setPassword(Idea_Password $password);

	/**
	 *
	 * get the password for this user
	 * @return Idea_Password
	 */
	public function getPassword();

}