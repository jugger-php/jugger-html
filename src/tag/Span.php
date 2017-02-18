<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Span extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('span', $content, $options);
    }
}
