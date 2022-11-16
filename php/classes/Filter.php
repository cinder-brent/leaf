<?php

/**
 * A Leaf filter.
 *
 * @see Filters.php
 *
 * @package Leaf
 */
class Filter {
	
	/** Arguments {@see setValue} */
		
		/** @var array $prefixArgs Prefix arguments. */
		public array $prefixArgs = [];
		
		/** @var array $suffixArgs Suffix arguments. */
		public array $suffixArgs = [];
		
	/** @var array|string $filter A callable filter. */
	private array|string $filter;
	
	/**
	 * Constructs the filter by setting $this->args and $this->filter.
	 *
	 * @param array|string $filter Callable filter.
	 * @param array $args Arguments to use to construct. {@see  set_args}
	 */
	function __construct(
		array|string $filter = "",
		array $prefixArgs = [],
		array $suffixArgs = []
	) {
		
		// Set
			
			// Filter
			$this->set_filter($filter);
			
			// Arguments
				
				// Prefix arguments
				$this->prefixArgs = $prefixArgs;
				
				// Suffix arguments
				$this->suffixArgs = $suffixArgs;
				
	}
	
	// $filter
		
		/**
		 * Set the filter.
		 *
		 * @param callable $filter Callable to use as filter.
		 *
		 * @return callable $filter
		 */
		function set_filter(callable $filter) {
			
			// Simply set $this->filter to $filter and return
			return $this->filter = $filter;
			
		}
		
		/**
		 * Get the filter.
		 *
		 * @return callable
		 */
		function get_filter() {
			
			// Simply return $this->filter
			return $this->filter;
			
		}
		
	/**
	 * Filter $input.
	 *
	 * @param mixed $input The input to filter.
	 *
	 * @return mixed The filtered $input.
	 */
	function filter($input = 1) {
		
		// Filter and return $input
		return call_user_func_array(
			$this->filter,
			[array_merge(
				$this->prefixArgs,
				$input,
				$this->suffixArgs
			)]
		);
		
	}
	
}

?>