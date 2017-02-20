<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Tbody extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('tbody', $content, $options);
    }
}
