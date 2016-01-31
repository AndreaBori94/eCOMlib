<?php

    require 'api_eby/ebay-sdk-php-autoloader.php';
    
    use \DTS\eBaySDK\Constants;
    use \DTS\eBaySDK\Finding\Services;
    use \DTS\eBaySDK\Finding\Types;

    $service = new Services\FindingService(array (
        'appId'      => 'CGM968b04-70b4-43d7-a7db-ff8903ad23b',
        'apiVersion' => '1.13.0',
        'sandbox'    => 'true',
        'globalId' => Constants\GlobalIds::US
    ));

    $request = new Types\FindItemsByKeywordsRequest();
    $request->keywords = 'Harry Potter';
    $response = $service->findItemsByKeywords($request);
    if ($response->ack !== 'Success') {
        if (isset($response->errorMessage)) {
            foreach ($response->errorMessage->error as $error) {
                printf("Error: %s\n", $error->message);
            }
        }
    } else {
        foreach ($response->searchResult->item as $item) {
            echo "<ul> $item->itemId";
            echo "  <li>" . $item->title . "</li>";
            echo "  <li>" . $item->sellingStatus->currentPrice->currencyId . "</li>";
            echo "  <li>" . $item->sellingStatus->currentPrice->value . "</li>";
            echo "</ul>";
            
        }
    }
?>