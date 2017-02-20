<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Td extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('td', $content, $options);
    }
}
