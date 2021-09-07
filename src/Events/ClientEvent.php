<?php

namespace GoetasWebservices\SoapServices\SoapClient\Events;

use Symfony\Contracts\EventDispatcher\Event;

class ClientEvent extends Event
{
    /**
     * @var
     */
    private $data;

    /**
     * @var string
     */
    private $eventName;

    /**
     * @param $data
     * @param ?string $eventName
     */
    public function __construct(&$data, ?string $eventName = null)
    {
        $this->data = &$data;
        $this->eventName = $eventName;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getEventName(): ?string
    {
        return $this->eventName;
    }
}
