<?php

    require 'api_eby/ebay-sdk-php-autoloader.php';
    
    use \DTS\eBaySDK\Shopping\Services;
    use \DTS\eBaySDK\Shopping\Types;
    use \DTS\eBaySDK\Constants;

    $service = new Services\ShoppingService(array (
        'appId'      => 'CGM968b04-70b4-43d7-a7db-ff8903ad23b',
        'apiVersion' => '871',
        'sandbox'    => 'true'
    ));

    $request = new Types\GeteBayTimeRequestType();
    $response = $service->geteBayTime($request);
    if ($response->Ack !== 'Success') {
        if (isset($response->Errors)) {
            foreach ($response->Errors as $error) {
                printf("Errors: %s\n", $error->ShortMessage);
                printf("Errors: %s\n", $error->LongMessage);
            }
        }
    } else {
        printf("The official eBay time is: %s\n", $response->Timestamp->format('H:i (\G\M\T) \o\n l jS F Y'));
    }
    exit;

?>