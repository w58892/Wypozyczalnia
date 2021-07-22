<?php
interface ResponseInterface
{
    public function getResponse();
}

class BasicObject implements ResponseInterface
{
    public function getResponse()
    {
        return [];
    }
}

class Decorator implements ResponseInterface
{
    private $response;
    private $value;

    public function __construct(ResponseInterface $response, string $value)
    {
        $this->response = $response;
        $this->value = $value;
    }

    public function getResponse()
    {
        return $this->response->getResponse().$this->value;
    }
}


$object = new BasicObject();
$decoratedObject = new Decorator($object,"lol");

echo $decoratedObject->getResponse(); // I'm basic object decorated!
?>