<?php

namespace eco_lib\config;

class EBYConfig
{

	private $config = null;

	public function __construct($config_file)
	{
		if ( is_file($config_file) ) {
			$this->config_file = require $config_file;
		}
	}

	public function getConfig()
	{
		return $this->config;
	}

}
