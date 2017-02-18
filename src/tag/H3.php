<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class H3 extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('h3', $content, $options);
    }
}
