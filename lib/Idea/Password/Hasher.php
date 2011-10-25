<?php

interface Idea_Password_Hasher
{

	/**
	 *
	 * get a hashed version of the supplied string
	 * @param string $value
	 * @return string
	 */
	public function hash($value);

}
