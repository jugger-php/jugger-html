<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Tr extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('tr', $content, $options);
    }
}
