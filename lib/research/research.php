<?php

/**
 * Research Object
 *
 * This object contains one research and it runs some tests.
 *
 * @author Wouter J
 * @since Version 1.0
 *
 * @property-write array $tests All tests in this research
 * @property string $name The name of the research
 * @property-read array $times The times resulsts
 * @property-read array $percentages The percentage results
 * @property-write int $repeat How much the test will repeated Default 1000
 */
class Research
{
	protected $tests = Array();
	protected $name;
	protected $times = Array();
	protected $percentages = Array();
	protected $repeat = 1000;

	/**
	 * The constructor
	 *
	 * Set up the name of the research.
	 *
	 * @param string $name The name of the research
	 */
	public function __construct( $name )
	{
		$this->name = (string) $name;
	}

	/**
	 * addTest
	 *
	 * With this method you can add tests to the research
	 *
	 * @param object $test The test object
	 */
	public function addTest( Test $test )
	{
		$this->tests[$test->getName()] = $test;
	}

	/**
	 * setRepeat
	 *
	 * Set a number how much the test would repeated
	 *
	 * @param int $repeat The repeat count
	 */
	public function setRepeat( $repeat )
	{
		$this->repeat = $repeat;
	}

	/**
	 * runTests
	 *
	 * Run all tests
	 */
	public function runTests()
	{
		foreach( $this->tests as $name => $test )
		{
			ob_start();
			$time = microtime(true);
			for( $i=0; $i < $this->repeat; $i++ )
			{
				$test->run();
			}
			$this->times[$name] = (microtime(true) - $time);

			unset($time);
			ob_end_clean();
		}

		$this->countPercentages();
	}

	/**
	 * count percentages
	 *
	 * Count all percentages
	 */
	protected function countPercentages()
	{
		$key = 100 / min($this->times);

		foreach( $this->times as $name => $time )
		{
			$this->percentages[$name] = round($key * $time);
		}
	}

	/**
	 * getResults
	 *
	 * Get the results
	 *
	 * @return array $result The times and percentages
	 */
	public function getResults()
	{
		$result = Array(
			'times' => Array(),
			'percentages' => Array()
		);

		foreach( $this->times as $name => $time )
		{
			$result['times'][$name] = $time / $this->repeat;
			$result['percentages'][$name] = $this->percentages[$name];
		}

		return $result;
	}

	/**
	 * getName
	 *
	 * Get the research name
	 * @retrurn string $name The name of the research
	 */
	public function getName()
	{
		return $this->name;
	}
}
