<?php
    $mapping = array(
    		'eco_lib\Library' => __DIR__ . '/Library.php',
    		'eco_lib\config\AWSConfig' => __DIR__ . '/config/AWSConfig.php',
    		'eco_lib\config\EBYConfig' => __DIR__ . '/config/EBYConfig.php',
    );
	spl_autoload_register(function ($class) use ($mapping) {
	    if (isset($mapping[$class])) {
	        require $mapping[$class];
	    }
	}, true);
?>