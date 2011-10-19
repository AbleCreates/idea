<?php

class Idea_Password
{

	/** @var string */
	protected $_raw;

	/** @var string */
	protected $_hash;

	/** @var string */
	protected $_salt;

	/** @var HashFilter */
	protected $_filter;

	/**
	 *
	 * initialize the password
	 * @param array $options
	 * @throws InvalidArgumentException
	 */
	public function __construct(array $options)
	{

		if (array_key_exists('raw', $options)) {
			$this->_raw = $options['raw'];
		}

		if (array_key_exists('hash', $options)) {
			$this->_hash = $options['hash'];
		}

		if (array_key_exists('salt', $options)) {
			$this->_salt = $options['salt'];
		}

		if (array_key_exists('filter', $options)) {
			$this->_filter = $options['filter'];
		}

		if (!($this->_raw xor $this->_hash)) {

			throw new InvalidArgumentException(
				'Either a raw or hashed password is required'
			);

		} elseif ($this->_raw
			&& (!$this->_salt || !$this->_filter instanceof Idea_Filter_Hash)
		) {

			throw new InvalidArgumentException(
				'Both a salt and a filter are required'
			);

		}

	}

	/**
	 *
	 * use the hashes to check if two passwords are equals
	 * @param Password $that
	 * @return boolean
	 */
	public function equals(Idea_Password $that)
	{

		return $this->getHash() == $that->getHash();

	}

	/**
	 *
	 * get the computed hash value of this password
	 * @return string
	 */
	public function getHash()
	{

		if (!$this->_hash) {
			$this->_hash = $this->_generateHash();
		}

		return $this->_hash;

	}

	/**
	 * get the salt used in the password hashing
	 * @return string
	 */
	public function getSalt()
	{

		return $this->_salt;

	}

	/**
	 *
	 * hash the raw password
	 * @return string
	 */
	protected function _generateHash()
	{

		return $this->_filter->filter(
			$this->_filter->filter(
				$this->_salt . $this->_filter->filter($this->_raw)
			)
		);

	}

}