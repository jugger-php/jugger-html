<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class H1 extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('h1', $content, $options);
    }
}
