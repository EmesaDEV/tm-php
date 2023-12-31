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

namespace Ticketmatic\Endpoints;

use Ticketmatic\Client;
use Ticketmatic\ClientException;
use Ticketmatic\Json;
use Ticketmatic\Model\EventstreamRequest;
use Ticketmatic\Model\EventstreamResult;

/**
 * Event stream to poll events in the account.
 *
 * ## Help Center
 *
 * Full documentation can be found in the Ticketmatic Help Center
 * (https://apps.ticketmatic.com/#/knowledgebase/api/eventstream).
 */
class Eventstream
{

    /**
     * Poll eventstream
     *
     * Poll the eventstream.
     *
     * @param Client $client
     * @param \Ticketmatic\Model\EventstreamRequest|array $params
     *
     * @throws ClientException
     *
     * @return \Ticketmatic\Model\EventstreamResult
     */
    public static function eventstream(Client $client, $params = null) {
        if ($params == null || is_array($params)) {
            $params = new EventstreamRequest($params == null ? array() : $params);
        }
        $req = $client->newRequest("GET", "/{accountname}/eventstream");

        $req->addQuery("id", $params->id);
        $req->addQuery("eventtypes", $params->eventtypes);
        $req->addQuery("ts", $params->ts);

        $result = $req->run("json");
        return EventstreamResult::fromJson($result);
    }
}
