<?php

namespace jugger\html;

class EmptyTag extends ContentTag
{
    public function __construct(string $content)
    {
        parent::__construct('', $content);
    }

    public function run()
    {
        return $this->content;
    }
}
