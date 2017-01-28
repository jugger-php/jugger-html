<?php

namespace jugger\html;

trait TagAccessTrait
{
    public function __set(string $name, $value)
    {
        $this->setAttribute($name, $value);
    }

    public function __get(string $name)
    {
        return $this->getAttribute($name);
    }
}
