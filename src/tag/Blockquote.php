<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Blockquote extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('blockquote', $content, $options);
    }
}
