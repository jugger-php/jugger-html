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

    public function __construct(string $tag, string $content = '', array $attributes = [])
    {
        $this->content = $content;
        parent::__construct($tag, $attributes);
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
        foreach ($this->childs as $tag) {
            $ret .= $tag->render();
        }
        return $ret;
    }
}
