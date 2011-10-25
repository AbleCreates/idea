<?php

interface Idea_Password_Salt_Generator
{

	/**
	 *
	 * returns a randomly generated salt
	 * @return string
	 */
	public function generate();

}
