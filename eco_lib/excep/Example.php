<?php

namespace eco_lib\except;

//use throw new Example("Errore", "messaggio");

class Example extends Exception {
	protected $title;
	
	public function __construct($title, $message, $code = 0, Exception $previous = null) {
	
		$this->title = $title;
	
		parent::__construct($message, $code, $previous);
	
	}
	
	public function getTitle(){
		return $this->title;
	}
}