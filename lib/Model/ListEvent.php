<?php
namespace Ticketmatic\Model;

use Ticketmatic\Json;

class ListEvent implements \jsonSerializable
{
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Unpack ListEvent from JSON.
     *
     * @return ListEvent
     */
    public static function fromJson($obj) {
        return new ListEvent(array(
        ));
    }

    /**
     * Serialize ListEvent to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        foreach ($fields as $field) {

        }
        return $result;
    }
}
