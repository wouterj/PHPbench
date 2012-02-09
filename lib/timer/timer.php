<?php

/**
 * Timer
 * 
 * The basic timer function
 */
class Timer
{
	/**
	 * All markers with the times
	 *
	 * @access protected
	 * @var Array
	 * @static
	 */
	protected static $markers = Array();

	/**
	 * A shortcut for start marker
	 *
	 * @return void
	 * @see Timer::setMarker()
	 * @static
	 */
	public static function start()
	{
		self::setMarker('start');
	}

	/**
	 * A shortcut for end marker
	 *
	 * @return void
	 * @see Timer::setMarker()
	 * @static
	 */
	public static function end()
	{
		self::setMarker('end');
	}

	/**
	 * Sets a time marker in the script
	 *
	 * @param string $name The name of the marker
	 * @return void
	 * @static
	 */
	public static function setMarker( $name )
	{
		self::$markers[$name] = microtime(true);
	}

	/**
	 * A shortcut for getDiff( 'start', 'end' )
	 *
	 * @return int The difference between start and end
	 * @see Timer::getDiff()
	 * @static
	 */
	public static function getResult()
	{
		return self::getDiff('end', 'start');
	}

	/**
	 * Get the difference between 2 markers
	 *
	 * @param string $marker1 The name of the first marker
	 * @param string $marker2 The name of the second marker
	 * @return int The difference between the times
	 * @static
	 */
	public static function getDiff( $marker1, $marker2 )
	{
		if( !isset(self::$markers[$marker1]) )
			throw new InvalidArgumentException('The Marker('.$marker1.' has not been set');
		if( !isset(self::$markers[$marker2]) )
			throw new InvalidArgumentException('The Marker('.$marker2.' has not been set');


		$diff = (self::$markers[$marker1] - self::$markers[$marker2]);

		if( $diff < 0 )
			$diff *= -1;

		return $diff;
	}
}
