<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Th extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('th', $content, $options);
    }
}
