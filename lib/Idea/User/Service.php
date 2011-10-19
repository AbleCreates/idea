<?php

class Idea_User_Service
{

	protected $_user;

	public function __construct(Idea_User $user)
	{

		$this->_user = $user;

	}

	public function resetPassword()
	{

		// generate new password and reset salt
		$password = new Idea_Password($options);

		$this->_user->clearSalt();

		// init new password and generate new salt


	}

}
