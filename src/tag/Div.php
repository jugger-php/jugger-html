<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Div extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('div', $content, $options);
    }
}
