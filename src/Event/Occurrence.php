<?php


namespace App\Event;

/**
 * Class Occurrence
 * @package App\Event
 */
class Occurrence implements EventInterface
{
    private int $value;

    /**
     * Occurrence constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }


    public function jsonSerialize(): array
    {
        return [
            'value' => $this->getValue()
        ];
    }
}