<?php

namespace jugger\html\tag;

use jugger\html\Tag;

class Input extends Tag
{
    public function __construct(string $type, array $attributes = [])
    {
        $tag = 'input';
        $attributes['type'] = $type;
        parent::__construct($tag, $attributes);
    }
}
