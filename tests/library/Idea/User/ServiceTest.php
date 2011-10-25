<?php

class Idea_User_ServiceTest extends PHPUnit_Framework_TestCase
{


	public function testSetRawPassword()
	{

		$rawPassword = 'abc123';

		$user = new Idea_User_User('chrisw');
		$service = new Idea_User_Service($user);

		$service->setRawPassword($rawPassword);

		$password = $user->getPassword();

		$tester = new Idea_Password(array(
			'raw' => $rawPassword,
			'salt' => $password->getSalt(),
			'hasher' => Idea_Password_Hasher_Adapter::getHasher(),
		));

		$this->assertTrue($password->equals($tester), 'Password is not ' . $rawPassword);

	}

	public function testResetPassword()
	{

		$user = new Idea_User_User('chrisw');
		$service = new Idea_User_Service($user);

		$rawPassword = $service->resetPassword();

		$password = $user->getPassword();

		$this->assertTrue($password instanceof Idea_Password, 'Password is not an Idea_Password');

		$this->assertNotEmpty($password->getSalt(), 'No salt store on password');
		$this->assertNotEmpty($password->getHash(), 'No hashed password');

		$validator = new Able_Validate_PasswordStrength();

		$this->assertTrue($validator->isValid($rawPassword), 'A weak password was generated');

	}

}
