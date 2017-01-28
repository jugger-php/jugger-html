<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Li extends ContentTag
{
    public function __construct(string $content = '', array $attributes = [])
    {
        $tag = 'li';
        parent::__construct($tag, $content, $attributes);
    }
}
