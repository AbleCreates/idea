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
	 * create a new user
	 */
	public function create(array $params)
	{

	    $this->populate($params);
	    $this->persist();

	}

	/**
	 *
	 * update a user
	 */
	public function update(array $params)
	{

	    $this->populate($params);
	    $this->persist();

	}

	/**
	 * get the user that this service is using
	 * @return Idea_User
	 */
	public function getUser()
	{

		return $this->_user;

	}

	/**
	 *
	 * set a new raw password on the user
	 * @param string $rawPassword
	 */
	public function setRawPassword($rawPassword)
	{

		$generator = Idea_Password_Salt_Generator_Adapter::getGenerator(16);
		$salt = $generator->generate();

		$password = new Idea_Password(array(
			'raw' => $rawPassword,
			'salt' => $salt,
			'hasher' => Idea_Password_Hasher_Adapter::getHasher(),
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
		$generator = Idea_Password_Generator_Adapter::getGenerator(array(
			'length' => 10,
			'includeLowerCaseChars' => true,
			'includeUpperCaseChars' => true,
			'includeDigits' => true,
		));

		$password = $generator->generate();

		$this->setRawPassword($password);

		return $password;

	}

	/**
	 *
	 * persist this user in storage
	 */
	protected function persist()
	{}

	/**
	 *
	 * populate this user with values
	 * @param array $params
	 */
	protected function populate(array $params)
	{}

}
