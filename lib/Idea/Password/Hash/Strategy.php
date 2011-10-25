<?php

abstract class Idea_Password_Hash_Strategy
{

	const STRATEGY_BASIC = 'Basic';

	/** @var Idea_Password_Hasher */
	protected $_hasher;

	/**
	 *
	 * initialize the hashing strategy
	 * @param Idea_Password_Hasher $hasher
	 */
	public function __construct(Idea_Password_Hasher $hasher)
	{

		$this->_hasher = $hasher;

	}

	/**
	 *
	 * hash the raw value
	 * @param string $value
	 * @param string $salt
	 * @return string
	 */
	abstract public function hash($value, $salt);

	/**
	 *
	 * get an instance of a hashing strategy
	 * @param string $strategy
	 * @param Idea_Password_Hasher $hasher
	 */
	public static function getHasher($strategy, Idea_Password_Hasher $hasher)
	{

		if (!in_array($strategy, self::getStrategies())) {
			throw new InvalidArgumentException('Invalid strategy');
		}

		$strategyClass = 'Idea_Password_Hash_Strategy_' . $strategy;
		return new $strategyClass($hasher);

	}

	/**
	 *
	 * get an array of all available strategies
	 * @return array
	 */
	public static function getStrategies()
	{

		return array(
			self::STRATEGY_BASIC,
		);

	}

}
