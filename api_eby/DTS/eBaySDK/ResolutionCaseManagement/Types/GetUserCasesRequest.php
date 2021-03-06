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

namespace DTS\eBaySDK\ResolutionCaseManagement\Types;

/**
 *
 * @property \DTS\eBaySDK\ResolutionCaseManagement\Types\ItemFilterType $itemFilter
 * @property \DTS\eBaySDK\ResolutionCaseManagement\Types\DateRangeFilterType $creationDateRangeFilter
 * @property \DTS\eBaySDK\ResolutionCaseManagement\Types\CaseTypeFilterType $caseTypeFilter
 * @property \DTS\eBaySDK\ResolutionCaseManagement\Types\CaseStatusFilterType $caseStatusFilter
 * @property \DTS\eBaySDK\ResolutionCaseManagement\Types\PaginationInput $paginationInput
 * @property \DTS\eBaySDK\ResolutionCaseManagement\Enums\CaseSortOrderType $sortOrder
 */
class GetUserCasesRequest extends \DTS\eBaySDK\ResolutionCaseManagement\Types\BaseRequest
{
    /**
     * @var array Properties belonging to objects of this class.
     */
    private static $propertyTypes = array(
        'itemFilter' => array(
            'type' => 'DTS\eBaySDK\ResolutionCaseManagement\Types\ItemFilterType',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'itemFilter'
        ),
        'creationDateRangeFilter' => array(
            'type' => 'DTS\eBaySDK\ResolutionCaseManagement\Types\DateRangeFilterType',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'creationDateRangeFilter'
        ),
        'caseTypeFilter' => array(
            'type' => 'DTS\eBaySDK\ResolutionCaseManagement\Types\CaseTypeFilterType',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'caseTypeFilter'
        ),
        'caseStatusFilter' => array(
            'type' => 'DTS\eBaySDK\ResolutionCaseManagement\Types\CaseStatusFilterType',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'caseStatusFilter'
        ),
        'paginationInput' => array(
            'type' => 'DTS\eBaySDK\ResolutionCaseManagement\Types\PaginationInput',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'paginationInput'
        ),
        'sortOrder' => array(
            'type' => 'string',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'sortOrder'
        )
    );

    /**
     * @param array $values Optional properties and values to assign to the object.
     */
    public function __construct(array $values = array())
    {
        list($parentValues, $childValues) = self::getParentValues(self::$propertyTypes, $values);

        parent::__construct($parentValues);

        if (!array_key_exists(__CLASS__, self::$properties)) {
            self::$properties[__CLASS__] = array_merge(self::$properties[get_parent_class()], self::$propertyTypes);
        }

        if (!array_key_exists(__CLASS__, self::$xmlNamespaces)) {
            self::$xmlNamespaces[__CLASS__] = 'http://www.ebay.com/marketplace/resolution/v1/services';
        }

        if (!array_key_exists(__CLASS__, self::$requestXmlRootElementNames)) {
            self::$requestXmlRootElementNames[__CLASS__] = 'getUserCasesRequest';
        }

        $this->setValues(__CLASS__, $childValues);
    }
}
