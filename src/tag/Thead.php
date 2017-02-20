<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Thead extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('thead', $content, $options);
    }
}
