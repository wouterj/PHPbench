<?php

/**
 * Research Object
 *
 * This object contains one research and it runs some tests.
 *
 * @author Wouter J
 * @since Version 1.0
 */
class Research
{
	/**
	 * All tests in this research
	 *
	 * @access protected
	 * @var Array
	 */
	protected $tests = Array();

	/**
	 * The name of the research
	 *
	 * @access protected
	 * @var String
	 */
	protected $name;

	/**
	 * The times results
	 *
	 * @access protected
	 * @var Array
	 */
	protected $times = Array();

	/**
	 * The percentage results
	 *
	 * @access protected
	 * @var Array
	 */
	protected $percentages = Array();

	/**
	 * How may times the test would repeated. Default: 1000
	 *
	 * @access protected
	 * @var Int
	 */
	protected $repeat = 1000;

	/**
	 * The constructor
	 *
	 * Set up the name of the research.
	 *
	 * @param string $name The name of the research
	 * @return void
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
	 * @return void
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
	 * @return void
	 */
	public function setRepeat( $repeat )
	{
		$this->repeat = $repeat;
	}

	/**
	 * runTests
	 *
	 * Run all tests
	 *
	 * @return void
	 */
	public function runTests()
	{
		foreach( $this->tests as $name => $test )
		{
			ob_start();
			Timer::start();
			for( $i=0; $i < $this->repeat; $i++ )
			{
				Timer::setMarker('Test-'.$i.'-start');
				$test->run();
				Timer::setMarker('Test-'.$i.'-end');
			}
			Timer::end();
			$this->times[$name] = Timer::getResult();

			unset($time);
			ob_end_clean();
		}

		$this->countPercentages();
	}

	/**
	 * count percentages
	 *
	 * Count all percentages
	 *
	 * @return void
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
