<?php

class RequestData implements ArrayAccess
{
    private array $data;

    public function __construct(array &$data)
    {
        $this->data = &$data;
    }

    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->$offset);
    }

    public function __get(string $name): string
    {
        return $this->data[$name];
    }

    public function offsetGet($offset): ?string
    {
        return $this->$offset;
    }

    public function __set(string $name, $value): void
    {
    }

    public function offsetSet($offset, $value): void
    {
    }

    public function __unset(string $name): void
    {
    }

    public function offsetUnset($offset): void
    {
    }
}
