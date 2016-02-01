<?php
require_once ("api_aws/aws-autoloader.php");

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;

$credentials = new Aws\Credentials\Credentials ( 'AKIAJFHCV3D4GTGAMW3A', 'JqVHr4d94L+pnljf7zLJyxzSla1R4asWZ+WY7TkJ' );

$sdk = new Aws\Sdk ( [ 
		'version' => 'latest',
		'region' => 'us-west-2',
		'credentials' => $credentials 
] );

$dynamodb = $sdk->createDynamoDb ();

$response = $dynamodb->getItem ( [ 
		'TableName' => 'ProductCatalog',
		'Key' => [ 
				'Id' => [ 
						'N' => '104' 
				] 
		] 
] );

echo ($response ['Item']);

?>