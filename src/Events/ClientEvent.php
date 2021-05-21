<?php

namespace GoetasWebservices\SoapServices\SoapClient\Events;

use Symfony\Contracts\EventDispatcher\Event;

class ClientEvent extends Event
{
    /**
     * @var string
     */
    private $data;

    public function __construct(string &$data)
    {
        $this->data = &$data;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }
}
