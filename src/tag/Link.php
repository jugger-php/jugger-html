<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Link extends ContentTag
{
    public function __construct(string $content = '', string $href = '#', array $attributes = [])
    {
        $tag = 'a';
        $attributes['href'] = $href;
        parent::__construct($tag, $content, $attributes);
    }
}
