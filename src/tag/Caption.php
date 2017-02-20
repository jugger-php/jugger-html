<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Caption extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('caption', $content, $options);
    }
}
