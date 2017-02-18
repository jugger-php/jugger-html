<?php

namespace jugger\html;

use jugger\html\Html;
use jugger\ui\Widget;

class Tag extends Widget
{
    protected $name;
    protected $options = [];

    public function __construct(string $name, array $options = [])
    {
        $this->name = $name;
        $this->setAttributes($options);
    }

    public function __set(string $name, $value)
    {
        $this->setAttribute($name, $value);
    }

    public function __get(string $name)
    {
        return $this->getAttribute($name);
    }

    public function setAttributes(array $options)
    {
        foreach ($options as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }

    public function setAttribute(string $name, $value)
    {
        $this->options[$name] = $value;
    }

    public function getAttribute($name)
    {
        return $this->options[$name] ?? null;
    }

    public function getGroupAttributesNames()
    {
        return ['data', 'aria'];
    }

    public function __toString()
    {
        return $this->render();
    }

    public function run()
    {
        $attrs = " ";
        $groupAttrs = $this->getGroupAttributesNames();
        foreach ($this->options as $name => $value) {
            if (is_bool($value) && $value) {
                $attrs .= "{$name}";
            }
            elseif ($value == "" || (is_array($value) && empty($value))) {
                continue;
            }
            elseif ($name == 'style') {
                $attrs .= self::renderStyleAttribute($value);
            }
            elseif (in_array($name, $groupAttrs)) {
                $attrs .= self::renderGroupAttribute($name, $value);
            }
            else {
                $value = Html::encode($value);
                $attrs .= "{$name}='{$value}'";
            }
            $attrs .= " ";
        }
        if (!empty($attrs)) {
            $attrs = substr($attrs, 0, -1);
        }
        return "<{$this->name}{$attrs}>";
    }

    public static function renderStyleAttribute($values)
    {
        if (is_string($values)) {
            $ret = $values;
        }
        else {
            $ret = "";
            foreach ($values as $name => $value) {
                $value = Html::encode($value);
                $ret .= "{$name}:{$value};";
            }
        }
        return "style='{$ret}'";
    }

    public static function renderGroupAttribute(string $prefix, array $values)
    {
        $ret = "";
        foreach ($values as $name => $value) {
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
            elseif (is_array($value)) {
                $value = json_encode($value);
            }
            else {
                // pass
            }

            $value = Html::encode($value);
            $ret .= "{$prefix}-{$name}='{$value}' ";
        }
        if (!empty($ret)) {
            $ret = substr($ret, 0, -1);
        }
        return $ret;
    }
}
