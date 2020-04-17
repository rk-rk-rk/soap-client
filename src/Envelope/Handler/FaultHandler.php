<?php

namespace GoetasWebservices\SoapServices\SoapClient\Envelope\Handler;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\XmlDeserializationVisitor;

class FaultHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'GoetasWebservices\SoapServices\SoapClient\Envelope\SoapEnvelope12\Parts\Fault\FaultDetail',
                'method' => 'deserializeFaultDetail'
            ),
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\SoapServices\SoapClient\Envelope\SoapEnvelope12\Parts\Fault\FaultDetail',
                'method' => 'deserializeFaultDetailJson'
            ),
            array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\SoapServices\SoapClient\Envelope\SoapEnvelope12\Parts\Fault\FaultDetail',
                'method' => 'serializeFaultDetailJson'
            ),
        );
    }

    public function deserializeFaultDetail(XmlDeserializationVisitor $visitor, \SimpleXMLElement $data, array $type, DeserializationContext $context)
    {
        $domElement = dom_import_simplexml($data);

        $document = new \DOMDocument('1.0', 'utf-8');

        $xml = '';
        foreach ($domElement->childNodes as $child) {
            $newEl = $document->importNode($child, true);
            $xml .= $document->saveXML($newEl);
        }
        return $xml;
    }

    public function serializeFaultDetailJson(JsonSerializationVisitor $visitor, $data, array $type, SerializationContext $context)
    {
        return $data;
    }

    public function deserializeFaultDetailJson(JsonDeserializationVisitor $visitor, $data, array $type, DeserializationContext $context)
    {
        return $data;
    }
}
