<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Header extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('header', $content, $options);
    }
}
