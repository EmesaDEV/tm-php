<?php
/**
 * Copyright (C) 2014-2017 by Ticketmatic BVBA <developers@ticketmatic.com>
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
 * @link        https://www.ticketmatic.com/
 */

namespace Ticketmatic\Test\Endpoints\Settings\System;

use Ticketmatic\Client;
use Ticketmatic\Endpoints\Settings\System\Fielddefinitions;
use Ticketmatic\Model\FieldDefinition;
use Ticketmatic\Model\FieldDefinitionQuery;
use Ticketmatic\Model\FielddefinitionsDataRequest;
use Ticketmatic\Model\FielddefinitionsDataResult;

class FielddefinitionsTest extends \PHPUnit_Framework_TestCase {

    public function testGet() {
        $accountcode = $_SERVER["TM_TEST_ACCOUNTCODE"];
        $accesskey = $_SERVER["TM_TEST_ACCESSKEY"];
        $secretkey = $_SERVER["TM_TEST_SECRETKEY"];
        $client = new Client($accountcode, $accesskey, $secretkey);

        $reqparams = new FieldDefinitionQuery(array(
            "typeid" => 10004,
        ));
        $req = Fielddefinitions::getlist($client, $reqparams);

        $this->assertGreaterThan(0, count($req->data));

    }

}
