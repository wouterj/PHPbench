<?php

/**
 * Test object
 *
 * This objects hold one single test and can run that test
 *
 * @propertie-write function $test The test that will run
 * @propertie string $name The name of the test
 */
class Test
{
	protected $test;
	protected $name;

	/**
	 * The constructor
	 *
	 * Set up a new Test. With a name and the function
	 *
	 * @param string $name The name of the test
	 * @param mixed $test The actual test
	 */
	public function __construct( $name, $test )
	{
		$this->name = preg_replace_callback('/\s(\w)/', function( $matches ) {
			return strtoupper($matches[1]);
		}, (string) $name);

		if( is_callable($test) )
			$this->test = $test;
		else
		{
			$this->test = function() {
				$test;
			};
		}
	}

	/**
	 * GetName
	 *
	 * Get the name of the test
	 *
	 * @return string $name The name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Run
	 *
	 * Run the test
	 */
	public function run()
	{
		$test = $this->test;
		return $test();
	}
}
