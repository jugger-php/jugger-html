<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class H2 extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('h2', $content, $options);
    }
}
