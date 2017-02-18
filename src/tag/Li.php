<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Li extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('li', $content, $options);
    }
}
