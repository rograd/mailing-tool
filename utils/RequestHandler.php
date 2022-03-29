<?php

class RequestHandler
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate($name)
    {
        if (isset($this->data[$name])) {
            $data = $this->data[$name];
            if (!empty($data)) {
                return $data;
            } else {
                throw new InputException("Pole $name nie może być puste");
            }
        } else {
            throw new InputException("Pole $name jest wymanage");
        }
    }
}
