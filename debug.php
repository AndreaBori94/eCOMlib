<?php
require 'api_aws/aws-autoloader.php';
require 'api_eby/ebay-sdk-php-autoloader.php';

$aws_cfg = array (
		'version' => 'latest',
		'region' => 'us-west-2',
		'credentials' => array (
				'AKIAJFHCV3D4GTGAMW3A',
				'JqVHr4d94L+pnljf7zLJyxzSla1R4asWZ+WY7TkJ' 
		) 
);

$eby_cfg = array (
		'sandbox' => array (
				'devId' => '24ee5baa-9d35-428e-b9f7-167d7fc15888',
				'appId' => 'CGM968b04-70b4-43d7-a7db-ff8903ad23b',
				'certId' => '8376fa9b-ffc2-46df-a406-c25bf28f5450',
				'userToken' => 'AgAAAA**AQAAAA**aAAAAA**5SeqVg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GhDpaLog2dj6x9nY+seQ**ObADAA**AAMAAA**mvKNWcyEW52daMrRGUF/S91xn4Sk+gI//sMCTEStI4H+rj5ZH+ZG0i/LRnuqozz0tlHwGtsM5XKTgZ/1HVZqsaAlx1b1nKYs505sYP0qchX2oHovuFgGHJCcCiwtfJxd7G1k+u8reg8ttrGov2aZgF+yCNZL7kNxxZVBAFXWJqZyQyZDUMZMGV7JfEOW/xCSZG14ZQJhYat5QATzNLLTKTloSwd+0MS7oUPwhR8XTtY+2YRLeHL5JpuILxUSyUacHMfe8kS8tNP5sbMrEjxsG9gO4EuJDISvtDapU8jiYg3BFI0hvBfwI6sMK01QXRQIYxvrhgHKq79suV8CslMWu8UFyZ6jBTRBPkYVfqzoj81mAORewhgx14vbRN9Hmu3SzJZzc+R5BxHgpbbw4MDndIVj6nM+A/yB/K7jM//6YK3JfhkPWYmNQZijpL5cZ+x7bBLOBZLKl6cmiLoiEnJQE3acaZCxm9JD9B0DOm+Q3ImoItx1+g1VBU62waxFkWO5fAl9sV+riGSWdNDAzFtGPs3qAFoogzPGkLHn2lNemWmwxggZK+YTy5mqgtSsRFLt2Ao50aTW4oQWsapFJDQhsJw8NeWjRsbGJqLWts5eZMT3Xre51d+Hb+qYUO27VoFHMgmm3CYxD+WsXe6iRvSCJSm0S9WyX5i88VQw7fO7hPoZ90vbVtALyqNkt+fdf2NpAiunIZ5TXbuZz2auMHUqNSS1M2bjEBEeayq6HVSWvcnHBoHiRchATIkmHFo2nCfL' 
		),
		'production' => array (
				'devId' => 'UNDEFINED',
				'appId' => 'UNDEFINED',
				'certId' => 'UNDEFINED',
				'userToken' => 'UNDEFINED' 
		),
		'findingApiVersion' => '1.12.0',
		'tradingApiVersion' => '871',
		'shoppingApiVersion' => '871',
		'halfFindingApiVersion' => '1.2.0' 
);

//configurazione
