<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class H5 extends ContentTag
{
    public function __construct(string $content = '', array $options = [])
    {
        parent::__construct('h5', $content, $options);
    }
}
