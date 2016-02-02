<?php
class GDXSquare
{
	
	public function __construct()
	{
		// Useless
	}
	
}

class QueueObject {
	
	public function __construct () {
		
	}
	
}

class Utils {
	
	public static function replace_until($target, $list, $str) {
		//replace using an array
	}
	
}













//General Exception
class GDXError extends Exception
{
	public function __construct($msg)
	{
		parent::__construct ( $msg );
	}
}