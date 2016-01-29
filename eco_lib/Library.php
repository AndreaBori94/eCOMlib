<?php

namespace eco_lib;

use eco_lib\config\AWSConfig as AWSConfig;
use eco_lib\config\EBYConfig as EBYConfig;

class Library
{
	private $config_aws;
	private $config_eby;

	public function __construct(AWSConfig $aws_cfg, EBYConfig $eby_cfg)
	{
		$this->config_aws = $aws_cfg->getConfig ();
		$this->config_eby = $eby_cfg->getConfig ();
	}

}

?>