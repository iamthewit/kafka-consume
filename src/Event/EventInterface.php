<?php


namespace App\Event;

use JsonSerializable;

interface EventInterface extends JsonSerializable
{
    public function getValue();
}