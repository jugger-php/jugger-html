<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Footer extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('footer', $content, $options);
    }
}
