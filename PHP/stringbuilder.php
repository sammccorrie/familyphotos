<?php
//=============================================================================
//
// Functions for building up a string
//
//-----------------------------------------------------------------------------

//=============================================================================
class StringBuilder {

	private $str = array();

	public function __construct() { }

	public function append($str) {
		$this->str[] = $str;
	}

	public function to_string() {
		return implode($this->str);
	}
	
	public function number() {
		return sizeof($this->str);
	}
};
