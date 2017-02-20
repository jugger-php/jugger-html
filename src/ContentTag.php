<?php

namespace jugger\html;

class ContentTag extends Tag
{
    public $content;
    protected $childs = [];

    public function add(Tag $child)
    {
        $this->childs[] = $child;
    }

    public function __construct(string $tag, string $content = '', array $options = [])
    {
        $this->content = $content;
        parent::__construct($tag, $options);
    }

    public function run()
    {
        $beginTag = parent::run();
        $content = $this->content . $this->renderChilds();
        $endTag = "</{$this->name}>";
        return "{$beginTag}{$content}{$endTag}";
    }

    public function renderChilds()
    {
        $ret = "";
        foreach ($this->getChilds() as $tag) {
            $ret .= $tag->render();
        }
        return $ret;
    }

    public function getChilds()
    {
        return $this->childs;
    }
}
