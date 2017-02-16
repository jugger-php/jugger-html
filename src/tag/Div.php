<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Div extends ContentTag
{
    public function __construct(string $content = '', array $attributes = [])
    {
        parent::__construct('div', $content, $attributes);
    }
}
