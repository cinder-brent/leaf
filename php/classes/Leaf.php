<?php

// require_once Filters
require_once CLASS_DIR . "Filters.php";

/**
 * Leaf is a teeny, tiny, universal class for PHP
 * 
 * Scale huge systems, do everything you ever wanted to do in a computer program
 * with Leaf. The justification? It's actually shorter to use Leaf than to use a
 * traditional database like MariaDB.
 * 
 * **See the code for all the details, it's well commented!**
 *
 * @author Brent Bevans <cinder.brent@gmail.com>
 * @package Leaf
 * @version 0.0.1
 */
class Leaf {

	/** @var mixed $value The value of this Leaf. {@see setValue} */
	private $value;

	/**
	 * Assigns $Filters and $value
	 *
	 * @param string $dataPath Location of the file to store data in.
	 * @param Filters $iFilters Filters to filter input with. {@see setValue}
	 * @param Filters $oFilters Filters to filter output with. {@see getValue}
	 */
	function __construct(
		public string $dataPath = "",
		public Filters $iFilters = new Filters,
		public Filters $oFilters = new Filters
	) {

		// If we have a $dataPath
		if (
			$dataPath &&
			is_file($dataPath) &&
			is_readable($dataPath) &&
			is_writable($dataPath)
		)

			// Read $value
			$this->value = file_get_contents($dataPath);

	}

	/**
	 * Filters $value with $oFilters->filter() and returns it
	 *
	 * @return mixed Filtered $value.
	 */
	function getValue() {

		// Return filtered input
		return $this->oFilters->filter($this->value);

	}

	/**
	 * Filter and set $value
	 *
	 * Filters input through $iFilters->filter(), saves to disk, assigns to
	 * 		$value, and returns it.
	 *
	 * @see Filters.php
	 *
	 * @param mixed $value The new value to filter and assign to $this->value.
	 *
	 * @return mixed The filtered value.
	 */
	function setValue($value = null) {

		// Filter $value
		$this->value = $this->iFilters->filter($value);

		// Save it to disk
		file_put_contents(
			$this->dataPath,
			$this->value
		);

		// And return it
		return $this->value;

	}

}