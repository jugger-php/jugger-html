<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Span extends ContentTag
{
    public function __construct(string $content = '', array $attributes = [])
    {
        parent::__construct('span', $content, $attributes);
    }
}
