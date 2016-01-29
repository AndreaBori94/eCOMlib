<?php

namespace eco_lib;

use eco_lib\config\AWSConfig as AWSConfig;
use eco_lib\config\EBYConfig as EBYConfig;

class Library
{
	public function __construct(AWSConfig $aws_cfg, EBYConfig $eby_cfg)
	{
		echo "calling cfg<br />";
	}
}

?>