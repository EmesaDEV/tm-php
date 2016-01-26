<?php
/**
 * Copyright (C) 2014-2016 by Ticketmatic BVBA <developers@ticketmatic.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @license     MIT X11 http://opensource.org/licenses/MIT
 * @author      Ticketmatic BVBA <developers@ticketmatic.com>
 * @copyright   Ticketmatic BVBA
 * @link        http://www.ticketmatic.com/
 */

namespace Ticketmatic\Model;

use Ticketmatic\Json;

/**
 * Product Instance Value
 *
 * ## Help Center
 *
 * Full documentation can be found in the Ticketmatic Help Center
 * (https://apps.ticketmatic.com/#/knowledgebase/api/types/ProductInstanceValue).
 */
class ProductInstanceValue implements \jsonSerializable
{
    /**
     * Create a new ProductInstanceValue
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Price
     *
     * @var float
     */
    public $price;

    /**
     * Voucher
     *
     * @var \Ticketmatic\Model\ProductVoucherValue
     */
    public $voucher;

    /**
     * Set of tickettypeprices (used in fixedbundle products)
     *
     * @var int[]
     */
    public $tickettypeprices;

    /**
     * Set of pricetype values (used in optionbundle products)
     *
     * @var \Ticketmatic\Model\ProductInstancePricetypeValue[]
     */
    public $pricetypes;

    /**
     * Set of tickettypes (used in optionbundle products)
     *
     * @var int[]
     */
    public $tickettypes;

    /**
     * Unpack ProductInstanceValue from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\ProductInstanceValue
     */
    public static function fromJson($obj) {
        if ($obj === null) {
            return null;
        }

        return new ProductInstanceValue(array(
            "price" => isset($obj->price) ? $obj->price : null,
            "voucher" => isset($obj->voucher) ? ProductVoucherValue::fromJson($obj->voucher) : null,
            "tickettypeprices" => isset($obj->tickettypeprices) ? $obj->tickettypeprices : null,
            "pricetypes" => isset($obj->pricetypes) ? Json::unpackArray("ProductInstancePricetypeValue", $obj->pricetypes) : null,
            "tickettypes" => isset($obj->tickettypes) ? $obj->tickettypes : null,
        ));
    }

    /**
     * Serialize ProductInstanceValue to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        if (!is_null($this->price)) {
            $result["price"] = floatval($this->price);
        }
        if (!is_null($this->voucher)) {
            $result["voucher"] = $this->voucher;
        }
        if (!is_null($this->tickettypeprices)) {
            $result["tickettypeprices"] = $this->tickettypeprices;
        }
        if (!is_null($this->pricetypes)) {
            $result["pricetypes"] = $this->pricetypes;
        }
        if (!is_null($this->tickettypes)) {
            $result["tickettypes"] = $this->tickettypes;
        }

        return $result;
    }
}
