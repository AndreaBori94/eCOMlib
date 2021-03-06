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

namespace DTS\eBaySDK\Trading\Types;

/**
 *
 * @property string $ItemID
 * @property string $SKU
 * @property \DateTime $StartTime
 * @property \DateTime $EndTime
 * @property \DTS\eBaySDK\Trading\Types\FeesType $Fees
 * @property string $CategoryID
 * @property string $Category2ID
 * @property \DTS\eBaySDK\Trading\Enums\DiscountReasonCodeType[] $DiscountReason
 * @property \DTS\eBaySDK\Trading\Types\ProductSuggestionsType $ProductSuggestions
 * @property \DTS\eBaySDK\Trading\Types\ListingRecommendationsType $ListingRecommendations
 */
class ReviseFixedPriceItemResponseType extends \DTS\eBaySDK\Trading\Types\AbstractResponseType
{
    /**
     * @var array Properties belonging to objects of this class.
     */
    private static $propertyTypes = array(
        'ItemID' => array(
            'type' => 'string',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'ItemID'
        ),
        'SKU' => array(
            'type' => 'string',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'SKU'
        ),
        'StartTime' => array(
            'type' => 'DateTime',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'StartTime'
        ),
        'EndTime' => array(
            'type' => 'DateTime',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'EndTime'
        ),
        'Fees' => array(
            'type' => 'DTS\eBaySDK\Trading\Types\FeesType',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'Fees'
        ),
        'CategoryID' => array(
            'type' => 'string',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'CategoryID'
        ),
        'Category2ID' => array(
            'type' => 'string',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'Category2ID'
        ),
        'DiscountReason' => array(
            'type' => 'string',
            'unbound' => true,
            'attribute' => false,
            'elementName' => 'DiscountReason'
        ),
        'ProductSuggestions' => array(
            'type' => 'DTS\eBaySDK\Trading\Types\ProductSuggestionsType',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'ProductSuggestions'
        ),
        'ListingRecommendations' => array(
            'type' => 'DTS\eBaySDK\Trading\Types\ListingRecommendationsType',
            'unbound' => false,
            'attribute' => false,
            'elementName' => 'ListingRecommendations'
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
            self::$xmlNamespaces[__CLASS__] = 'urn:ebay:apis:eBLBaseComponents';
        }

        $this->setValues(__CLASS__, $childValues);
    }
}
