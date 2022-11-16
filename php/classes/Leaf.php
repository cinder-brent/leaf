<?php

// require_once Filters
require_once CLASS_DIR . "Filters.php";

/**
 * @todo Finish comments...
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
	 * @param Filters $oFilters Filters to filter output with. {@see getValue}
	 * @param Filters $iFilters Filters to filter input with. {@see setValue}
	 */
	function __construct(
		public string $dataPath = "",
		public Filters $oFilters = new Filters,
		public Filters $iFilters = new Filters
	) {
		
		// If we have a $dataPath
		if ($dataPath) {
			
			// If $dataPath is_file, is_readable, and is_writable
			if (
				is_file($dataPath) &&
				is_readable($dataPath) &&
				is_writable($dataPath)
			)
				
				// Read $value
				$this->value = file_get_contents($dataPath);
				
			// Otherwise
			else
				
				/** @todo Finish... */
				die("Leaf::__construct - \$dataPath either isn't a file, isn't\
					readable, or isn't writable.");
				
			// Load it
			$this->value = file_get_contents($
			
		}
		
		// Otherwise
		else
			
			// die
			die("You must supply a data path!");
			
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

?>