<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Ul extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('ul', $content, $options);
    }
}
