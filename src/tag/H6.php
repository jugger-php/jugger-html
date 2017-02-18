<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class H6 extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('h6', $content, $options);
    }
}
