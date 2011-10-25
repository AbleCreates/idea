<?php

abstract class Idea_Password_Generator_Adapter
	implements Idea_Password_Generator
{

	/**
	 *
	 * get an instance of a password generator
	 * @param array $options
	 * @return Idea_Password_Generator
	 */
	public static function getGenerator(array $options = array())
	{

		$generator = new Idea_Password_Generator(array(
			'length' => 10,
			'includeLowerCaseChars' => true,
			'includeUpperCaseChars' => true,
			'includeDigits' => true,
		));



	}

}
