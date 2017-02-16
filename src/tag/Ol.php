<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Ol extends ContentTag
{
    public function __construct(string $content = '', array $attributes = [])
    {
        parent::__construct('ol', $content, $attributes);
    }
}
