<?php

class Idea_Password_Hash_Strategy_Basic extends Idea_Password_Hash_Strategy
{

	public function hash($value, $salt)
	{

		return $this->_hasher->hash(
			$this->_hasher->hash(
				$salt . $this->_hasher->hash($value)
			)
		);

	}

}
