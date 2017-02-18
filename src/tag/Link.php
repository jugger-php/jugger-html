<?php

namespace jugger\html\tag;

use jugger\html\ContentTag;

class Link extends ContentTag
{
    public function __construct(string $content = '', string $href = '#', array $options = [])
    {
        $options['href'] = $href;
        parent::__construct('a', $content, $options);
    }
}
