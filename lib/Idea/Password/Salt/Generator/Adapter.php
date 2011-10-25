<?php

abstract class Idea_Password_Salt_Generator_Adapter
	implements Idea_Password_Salt_Generator
{

	/**
	 *
	 * get an instance of a salt generator
	 * @param array $options
	 * @return Idea_Password_Salt_Generator
	 */
	public static function getGenerator($length)
	{

		return new Idea_Password_Salt_Generator_AbleRandomString($length);

	}

}
