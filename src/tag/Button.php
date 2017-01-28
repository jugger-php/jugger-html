<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Button extends ContentTag
{
    public function __construct(string $content = '', array $attributes = [])
    {
        $tag = 'button';
        parent::__construct($tag, $content, $attributes);
    }
}
