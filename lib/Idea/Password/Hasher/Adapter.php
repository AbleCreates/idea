<?php

abstract class Idea_Password_Hasher_Adapter
	implements Idea_Password_Hasher
{

	/**
	 *
	 * get an instance of a password hasher
	 * @return Idea_Password_Hasher
	 */
	public static function getHasher()
	{

		return new Idea_Password_Hasher_AbleHashFilter();

	}

}
