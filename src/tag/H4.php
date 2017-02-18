<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class H4 extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('h4', $content, $options);
    }
}
