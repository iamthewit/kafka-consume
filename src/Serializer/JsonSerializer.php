<?php


namespace App\Serializer;

use App\Event\EventInterface;
use App\Event\Occurrence;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\MessageDecodingFailedException;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

/**
 * Class JsonSerializer
 * @package App\Serializer
 */
class JsonSerializer implements SerializerInterface
{

    public function decode(array $encodedEnvelope): Envelope
    {
        $json = json_decode($encodedEnvelope['body'], true, 512, JSON_THROW_ON_ERROR);
        $event = $json['event'];
        $data = $json['data'];

        return new Envelope(new Occurrence($data['value']));
    }

    public function encode(Envelope $envelope): array
    {
        /** @var EventInterface $event */
        $event = $envelope->getMessage();

        if (is_a($event, EventInterface::class)) {
            return [
                'key' => (string) $event->getValue(),
                'headers' => [
                ],
                'body' => json_encode([
                    'event' => get_class($event),
                    'data' => $event,
                ]),
            ];
        } else {
            return [
                'key' => '',
                'headers' => [
                ],
                'body' => '',
            ];
        }
    }
}