<?php

class Idea_User_Service
{

	/** @var Idea_User */
	protected $_user;

	/**
	 *
	 * initialize the service with an instance of a user
	 * @param Idea_User $user
	 */
	public function __construct(Idea_User $user)
	{

		$this->_user = $user;

	}

	/**
	 *
	 * set a new raw password on the user
	 * @param string $rawPassword
	 */
	public function setRawPassword($rawPassword)
	{

		$generator = new Idea_Generator_RandomString(16);
		$salt = $generator->generate();

		$password = new Idea_Password(array(
			'raw' => $rawPassword,
			'salt' => $salt,
			'filter' => new Idea_Filter_Hash(),
 		));

 		$this->_user->setPassword($password);

	}

	/**
	 *
	 * reset the user's password to a new random string
	 * @return string
	 */
	public function resetPassword()
	{

		// generate new password
		$generator = new Idea_Generator_Password(array(
			'length' => 10,
			'includeLowerCaseChars' => true,
			'includeUpperCaseChars' => true,
			'includeDigits' => true,
		));

		$password = $generator->generate();

		$this->setRawPassword($password);

		return $password;

	}

}
