<?php

// require_once Filter
require_once CLASS_DIR . "Filter.php";

/**
 * Filters
 *
 * @package Leaf
 */
class Filters {
	
	/** @var array $filters An array of filters (in a specific order). */
	private array $filters = [];
	
	/**
	 * Populates $this->filters with given $filters.
	 *
	 * @param array $filters Filters to (potentially) use. {@see spliceFilters}
	 */
	function __construct(array $filters = []) {
		
		// Splice filters
		$this->spliceFilters($filters);
		
	}
	
	// $filters
		
		/**
		 * Splice filters into $this->filters.
		 *
		 * @param array|Filter $spliceDefs Splice definitions to fulfill. Either a
		 * 		single Filter, where that filter is pushed onto $this->filters,
		 * 		an array of splice definitions, or a single splice definition,
		 * 		where a splice definition is the following:
		 * 			$spliceDef["offset"]		- The element to start splicing
		 * 				after.
		 * 			$spliceDef["length"]		- The number of filters to
		 * 				replace, starting at $spliceDef["offset"].
		 * 			$spliceDef["replacements"]	- The filters to splice.
		 */
		function spliceFilters(array|Filter $spliceDefs = []) {
			
			// require_once arrayPack
			require_once FUNC_DIR . "arrayPack.php";
			
			// arrayPack
			$spliceDefs = arrayPack(
				$spliceDefs,
				"replacements"
			);
				
			// Initialize
			$padding = 0;
			
			/** @var array $spliceDef The current splice definition. */
			foreach ($spliceDefs as $spliceDef) {
				
				/** @var int $paddingStart Padding start. */
				$paddingStart = count($this->filters);
				
				// Fulfill $spliceDef
				array_splice(
					$this->filters,
					($spliceDef["offset"] ?? 0) + $padding,
					$spliceDef["length"] ?? null,
					$spliceDef["replacements"] ?? []
				);
				
				/** @var int $paddingEnd Padding end. */
				$paddingEnd = count($this->filters);
				
				// Adjust padding
				$padding += $paddingEnd - $paddingStart;
				
			}
			
			// Return getFilters
			return $this->getFilters();
			
		}
		
		/**
		 * Get $filters.
		 *
		 * @return array $filters
		 */
		function getFilters() {
			
			// Simply return $filters
			return $this->filters;
			
		}
		
	/**
	 * Filter $input through $this->filters.
	 *
	 * @param mixed $input The input to filter.
	 *
	 * @return mixed The filtered input.
	 */
	function filter($value = 1) {
		
		/** @var Filter $Filter The current filter. */
		foreach ($this->filters as $Filter) {
			
			// Filter $value
			$value = $Filter->filter($value);
			
		}
		
		// Return $value
		return $value;
		
	}
	
}

?>