<?php
/**
 * Copyright 2014 David T. Sadler
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace DTS\eBaySDK\FileTransfer\Services;

/**
 * Base class for the FileTransfer service.
 */
class FileTransferBaseService extends \DTS\eBaySDK\Services\BaseService
{
    /**
     * @var string Current version of the SDK
     */

    /**
     * Constants for the various HTTP headers required by the API.
     */
    const HDR_API_VERSION = 'X-EBAY-SOA-SERVICE-VERSION';
    const HDR_AUTH_TOKEN = 'X-EBAY-SOA-SECURITY-TOKEN';
    const HDR_CONTENT_TYPE = 'CONTENT-TYPE';
    const HDR_MESSAGE_PROTOCOL = 'X-EBAY-SOA-MESSAGE-PROTOCOL';
    const HDR_OPERATION_NAME = 'X-EBAY-SOA-OPERATION-NAME';
    const HDR_SERVICE_NAME = 'X-EBAY-SOA-SERVICE-NAME';

    /**
     * @param array $config Optional configuration option values.
     * @param \DTS\eBaySDK\Interfaces\HttpClientInterface $httpClient The object that will handle sending requests to the API.
     */
    public function __construct($config = array(), \DTS\eBaySDK\Interfaces\HttpClientInterface $httpClient = null)
    {
        if (!array_key_exists(get_called_class(), self::$configOptions)) {
            self::$configOptions[get_called_class()] = array(
                'apiVersion' => array('required' => false),
                'authToken' => array('required' => true)
            );
        }

        parent::__construct('https://storage.ebay.com/FileTransferService', 'https://storage.sandbox.ebay.com/FileTransferService', $config, $httpClient);
    }

    /**
     * Sends an API request.
     *
     * This method overrides the parent so that it can modify
     * the request object before is handled by the parent class.
     *
     * @param string $name The name of the operation.
     * @param \DTS\eBaySDK\Types\BaseType $request Request object containing the request information.
     * @param string The name of the PHP class that will be created from the XML response.
     *
     * @return mixed A response object created from the XML respose.
     */
    protected function callOperation($name, \DTS\eBaySDK\Types\BaseType $request, $responseClass)
    {
        /**
            Modify the request object to add xop:Include element.
         */
        if ($name === 'uploadFile' && $request->hasAttachment()) {
            /**
                Don't modify a request if the file attachment already exists.
             */
            if( !isset($request->fileAttachment)) {
                $request->fileAttachment = new \DTS\eBaySDK\FileTransfer\Types\FileAttachment();
            }

            if(!isset($request->fileAttachment->Data)) {
                $request->fileAttachment->Data = '<xop:Include xmlns:xop="http://www.w3.org/2004/08/xop/include" href="cid:attachment.bin@devbay.net"/>';
            }

            if(!isset($request->fileAttachment->Size)) {
                $attachment = $request->attachment();
                $request->fileAttachment->Size = strlen($attachment['data']);
            }
        }

        return parent::callOperation($name, $request, $responseClass);
    }

    /**
     * Build the needed eBay HTTP headers.
     *
     * @param string $operationName The name of the operation been called.
     *
     * @return array An associative array of eBay http headers.
     */
    protected function getEbayHeaders($operationName)
    {
        $headers = array();

        // Add required headers first.
        $headers[self::HDR_AUTH_TOKEN] = $this->config('authToken');
        $headers[self::HDR_OPERATION_NAME] = $operationName;

        // Add optional headers.
        if ($this->config('apiVersion')) {
            $headers[self::HDR_API_VERSION] = $this->config('apiVersion');
        }

        return $headers;
    }
}
