<?php


namespace App\Handler;

use App\Event\Occurrence;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Class OccurrenceHandler
 * @package App\Handler
 */
#[AsMessageHandler]
class OccurrenceHandler
{
    public function __invoke(Occurrence $event)
    {
        dump('An Event Occurred!', $event);
    }
}