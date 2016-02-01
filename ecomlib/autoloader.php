<?php
require_once ("api_aws/aws-autoloader.php");
require_once ("api_eby/ebay-sdk-php-autoloader.php");

$mapping = array (
		'ecomlib\EComLib' => __DIR__ . '/ecomlib/EComLibt.php' 
);

spl_autoload_register ( function ($class) use($mapping)
{
	if (isset ( $mapping [$class] ))
	{
		require $mapping [$class];
	}
}, true );

?>