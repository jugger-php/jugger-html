<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class P extends ContentTag
{
    public function __construct(string $content = '', array $attributes = [])
    {
        $tag = 'p';
        parent::__construct($tag, $content, $attributes);
    }
}
