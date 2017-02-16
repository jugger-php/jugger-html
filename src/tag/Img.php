<?php

namespace jugger\html\tag;

use jugger\html\Tag;

class Img extends Tag
{
    public function __construct(string $src, array $attributes = [])
    {
        $attributes['src'] = $src;
        parent::__construct('img', $attributes);
    }
}
