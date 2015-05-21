<?php
/**
 * Copyright (C) 2014-2015 by Ticketmatic BVBA <developers@ticketmatic.com>
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
 * A single payment method.
 *
 * More info: see the get operation
 * (https://apps.ticketmatic.com/#/knowledgebase/api/settings_ticketsales_paymentmethods/get)
 * and the payment methods endpoint
 * (https://apps.ticketmatic.com/#/knowledgebase/api/settings_ticketsales_paymentmethods).
 *
 * ## Help Center
 *
 * Full documentation can be found in the Ticketmatic Help Center
 * (https://apps.ticketmatic.com/#/knowledgebase/api/types/PaymentMethod).
 */
class PaymentMethod implements \jsonSerializable
{
    /**
     * Create a new PaymentMethod
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Unique ID
     *
     * **Note:** Ignored when creating a new payment method.
     *
     * **Note:** Ignored when updating an existing payment method.
     *
     * @var int
     */
    public $id;

    /**
     * Name of the payment method
     *
     * @var string
     */
    public $name;

    /**
     * Internal remark, will not be shown to customers
     *
     * @var string
     */
    public $internalremark;

    /**
     * Type of the paymentmethod.
     *
     * @var int
     */
    public $paymentmethodtypeid;

    /**
     * Specific configuration for the payment method, content depends on the payment
     * method type.
     *
     * **Note:** Not set when retrieving a list of payment methods.
     *
     * @var \Ticketmatic\Model\PaymentmethodConfig
     */
    public $config;

    /**
     * Created timestamp
     *
     * **Note:** Ignored when creating a new payment method.
     *
     * **Note:** Ignored when updating an existing payment method.
     *
     * @var \DateTime
     */
    public $createdts;

    /**
     * Last updated timestamp
     *
     * **Note:** Ignored when creating a new payment method.
     *
     * **Note:** Ignored when updating an existing payment method.
     *
     * @var \DateTime
     */
    public $lastupdatets;

    /**
     * Whether or not this item is archived
     *
     * **Note:** Ignored when creating a new payment method.
     *
     * **Note:** Ignored when updating an existing payment method.
     *
     * @var bool
     */
    public $isarchived;

    /**
     * Unpack PaymentMethod from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\PaymentMethod
     */
    public static function fromJson($obj) {
        if ($obj === null) {
            return null;
        }

        return new PaymentMethod(array(
            "id" => isset($obj->id) ? $obj->id : null,
            "name" => isset($obj->name) ? $obj->name : null,
            "internalremark" => isset($obj->internalremark) ? $obj->internalremark : null,
            "paymentmethodtypeid" => isset($obj->paymentmethodtypeid) ? $obj->paymentmethodtypeid : null,
            "config" => isset($obj->config) ? PaymentmethodConfig::fromJson($obj->config) : null,
            "createdts" => isset($obj->createdts) ? Json::unpackTimestamp($obj->createdts) : null,
            "lastupdatets" => isset($obj->lastupdatets) ? Json::unpackTimestamp($obj->lastupdatets) : null,
            "isarchived" => isset($obj->isarchived) ? $obj->isarchived : null,
        ));
    }

    /**
     * Serialize PaymentMethod to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        if (!is_null($this->id)) {
            $result["id"] = intval($this->id);
        }
        if (!is_null($this->name)) {
            $result["name"] = strval($this->name);
        }
        if (!is_null($this->internalremark)) {
            $result["internalremark"] = strval($this->internalremark);
        }
        if (!is_null($this->paymentmethodtypeid)) {
            $result["paymentmethodtypeid"] = intval($this->paymentmethodtypeid);
        }
        if (!is_null($this->config)) {
            $result["config"] = $this->config;
        }
        if (!is_null($this->createdts)) {
            $result["createdts"] = Json::packTimestamp($this->createdts);
        }
        if (!is_null($this->lastupdatets)) {
            $result["lastupdatets"] = Json::packTimestamp($this->lastupdatets);
        }
        if (!is_null($this->isarchived)) {
            $result["isarchived"] = (bool)$this->isarchived;
        }

        return $result;
    }
}
