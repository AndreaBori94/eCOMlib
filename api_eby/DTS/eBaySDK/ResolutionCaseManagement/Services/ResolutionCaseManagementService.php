<?php
/**
 * THE CODE IN THIS FILE WAS GENERATED FROM THE EBAY WSDL USING THE PROJECT:
 *
 * https://github.com/davidtsadler/ebay-api-sdk-php
 *
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

namespace DTS\eBaySDK\ResolutionCaseManagement\Services;

class ResolutionCaseManagementService extends \DTS\eBaySDK\ResolutionCaseManagement\Services\ResolutionCaseManagementBaseService
{
    /**
     * @param array $config Optional configuration option values.
     * @param \DTS\eBaySDK\Interfaces\HttpClientInterface $httpClient The object that will handle sending requests to the API.
     */
    public function __construct($config = array(), \DTS\eBaySDK\Interfaces\HttpClientInterface $httpClient = null)
    {
        parent::__construct($config, $httpClient);
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\GetVersionRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\GetVersionResponse
     */
    public function getVersion(\DTS\eBaySDK\ResolutionCaseManagement\Types\GetVersionRequest $request)
    {
        return $this->callOperation(
            'getVersion',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\GetVersionResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\GetUserCasesRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\GetUserCasesResponse
     */
    public function getUserCases(\DTS\eBaySDK\ResolutionCaseManagement\Types\GetUserCasesRequest $request)
    {
        return $this->callOperation(
            'getUserCases',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\GetUserCasesResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\GetEBPCaseDetailRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\GetEBPCaseDetailResponse
     */
    public function getEBPCaseDetail(\DTS\eBaySDK\ResolutionCaseManagement\Types\GetEBPCaseDetailRequest $request)
    {
        return $this->callOperation(
            'getEBPCaseDetail',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\GetEBPCaseDetailResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\GetActivityOptionsRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\GetActivityOptionsResponse
     */
    public function getActivityOptions(\DTS\eBaySDK\ResolutionCaseManagement\Types\GetActivityOptionsRequest $request)
    {
        return $this->callOperation(
            'getActivityOptions',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\GetActivityOptionsResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\IssueFullRefundRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\IssueFullRefundResponse
     */
    public function issueFullRefund(\DTS\eBaySDK\ResolutionCaseManagement\Types\IssueFullRefundRequest $request)
    {
        return $this->callOperation(
            'issueFullRefund',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\IssueFullRefundResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideTrackingInfoRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideTrackingInfoResponse
     */
    public function provideTrackingInfo(\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideTrackingInfoRequest $request)
    {
        return $this->callOperation(
            'provideTrackingInfo',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideTrackingInfoResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\OfferOtherSolutionRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\OfferOtherSolutionResponse
     */
    public function offerOtherSolution(\DTS\eBaySDK\ResolutionCaseManagement\Types\OfferOtherSolutionRequest $request)
    {
        return $this->callOperation(
            'offerOtherSolution',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\OfferOtherSolutionResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\EscalateToCustomerSupportRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\EscalateToCustomerSupportResponse
     */
    public function escalateToCustomerSupport(\DTS\eBaySDK\ResolutionCaseManagement\Types\EscalateToCustomerSupportRequest $request)
    {
        return $this->callOperation(
            'escalateToCustomerSupport',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\EscalateToCustomerSupportResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\AppealToCustomerSupportRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\AppealToCustomerSupportResponse
     */
    public function appealToCustomerSupport(\DTS\eBaySDK\ResolutionCaseManagement\Types\AppealToCustomerSupportRequest $request)
    {
        return $this->callOperation(
            'appealToCustomerSupport',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\AppealToCustomerSupportResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\OfferPartialRefundRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\OfferPartialRefundResponse
     */
    public function offerPartialRefund(\DTS\eBaySDK\ResolutionCaseManagement\Types\OfferPartialRefundRequest $request)
    {
        return $this->callOperation(
            'offerPartialRefund',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\OfferPartialRefundResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\IssuePartialRefundRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\IssuePartialRefundResponse
     */
    public function issuePartialRefund(\DTS\eBaySDK\ResolutionCaseManagement\Types\IssuePartialRefundRequest $request)
    {
        return $this->callOperation(
            'issuePartialRefund',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\IssuePartialRefundResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideShippingInfoRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideShippingInfoResponse
     */
    public function provideShippingInfo(\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideShippingInfoRequest $request)
    {
        return $this->callOperation(
            'provideShippingInfo',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideShippingInfoResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideReturnInfoRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideReturnInfoResponse
     */
    public function provideReturnInfo(\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideReturnInfoRequest $request)
    {
        return $this->callOperation(
            'provideReturnInfo',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideReturnInfoResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideRefundInfoRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideRefundInfoResponse
     */
    public function provideRefundInfo(\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideRefundInfoRequest $request)
    {
        return $this->callOperation(
            'provideRefundInfo',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\ProvideRefundInfoResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\UploadDocumentsRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\UploadDocumentsResponse
     */
    public function uploadDocuments(\DTS\eBaySDK\ResolutionCaseManagement\Types\UploadDocumentsRequest $request)
    {
        return $this->callOperation(
            'uploadDocuments',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\UploadDocumentsResponse'
        );
    }

    /**
     * @param \DTS\eBaySDK\ResolutionCaseManagement\Types\OfferRefundUponReturnRequest $request
     * @return \DTS\eBaySDK\ResolutionCaseManagement\Types\OfferRefundUponReturnResponse
     */
    public function offerRefundUponReturn(\DTS\eBaySDK\ResolutionCaseManagement\Types\OfferRefundUponReturnRequest $request)
    {
        return $this->callOperation(
            'offerRefundUponReturn',
            $request,
            '\DTS\eBaySDK\ResolutionCaseManagement\Types\OfferRefundUponReturnResponse'
        );
    }
}
