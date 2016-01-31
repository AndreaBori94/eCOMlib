<?php

    require 'api_eby/ebay-sdk-php-autoloader.php';

    use \DTS\eBaySDK\Constants;
    use \DTS\eBaySDK\Trading\Services;
    use \DTS\eBaySDK\Trading\Types;
    use \DTS\eBaySDK\Trading\Enums;

    $service = new Services\TradingService(array(
        'appId'      => 'CGM968b04-70b4-43d7-a7db-ff8903ad23b',
        'apiVersion' => '871',
        'sandbox'    => 'true',
        'siteId' => Constants\SiteIds::US
    ));

    $request = new Types\GetStoreRequestType();
    $request->RequesterCredentials = new Types\CustomSecurityHeaderType();
    $request->RequesterCredentials->eBayAuthToken = 'AgAAAA**AQAAAA**aAAAAA**5SeqVg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GhDpaLog2dj6x9nY+seQ**ObADAA**AAMAAA**mvKNWcyEW52daMrRGUF/S91xn4Sk+gI//sMCTEStI4H+rj5ZH+ZG0i/LRnuqozz0tlHwGtsM5XKTgZ/1HVZqsaAlx1b1nKYs505sYP0qchX2oHovuFgGHJCcCiwtfJxd7G1k+u8reg8ttrGov2aZgF+yCNZL7kNxxZVBAFXWJqZyQyZDUMZMGV7JfEOW/xCSZG14ZQJhYat5QATzNLLTKTloSwd+0MS7oUPwhR8XTtY+2YRLeHL5JpuILxUSyUacHMfe8kS8tNP5sbMrEjxsG9gO4EuJDISvtDapU8jiYg3BFI0hvBfwI6sMK01QXRQIYxvrhgHKq79suV8CslMWu8UFyZ6jBTRBPkYVfqzoj81mAORewhgx14vbRN9Hmu3SzJZzc+R5BxHgpbbw4MDndIVj6nM+A/yB/K7jM//6YK3JfhkPWYmNQZijpL5cZ+x7bBLOBZLKl6cmiLoiEnJQE3acaZCxm9JD9B0DOm+Q3ImoItx1+g1VBU62waxFkWO5fAl9sV+riGSWdNDAzFtGPs3qAFoogzPGkLHn2lNemWmwxggZK+YTy5mqgtSsRFLt2Ao50aTW4oQWsapFJDQhsJw8NeWjRsbGJqLWts5eZMT3Xre51d+Hb+qYUO27VoFHMgmm3CYxD+WsXe6iRvSCJSm0S9WyX5i88VQw7fO7hPoZ90vbVtALyqNkt+fdf2NpAiunIZ5TXbuZz2auMHUqNSS1M2bjEBEeayq6HVSWvcnHBoHiRchATIkmHFo2nCfL';

    $response = $service->getStore($request);

    if (isset($response->Errors)) {
        foreach ($response->Errors as $error) {
            printf("%s: %s\n%s\n\n",
                $error->SeverityCode === Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
                $error->ShortMessage,
                $error->LongMessage
            );
        }
    }
    if ($response->Ack !== 'Failure') {
        $store = $response->Store;
        printf("Name: %s\nDescription: %s\nURL: %s\n\n",
            $store->Name,
            $store->Description,
            $store->URL
        );
        foreach ($store->CustomCategories->CustomCategory as $category) {
            printCategory($category, 0);
        }
    }

    function printCategory($category, $level)
    {
        printf("%s%s : (%s)\n",
            str_pad('', $level * 4),
            $category->Name,
            $category->CategoryID);
        foreach ($category->ChildCategory as $category) {
            printCategory($category, $level + 1);
        }
    }
?>