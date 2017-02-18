<?php

namespace jugger\html\tag;

use jugger\html\Tag;

class Input extends Tag
{
    public function __construct(string $type, array $options = [])
    {
        $options['type'] = $type;
        parent::__construct('input', $options);
    }
}
