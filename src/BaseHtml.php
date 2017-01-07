<?php

namespace jugger\html;

abstract class BaseHtml
{
    public static $attributeOrder = [
       'type',
       'id',
       'class',
       'name',
       'value',
       'href',
       'src',
       'action',
       'method',
       'selected',
       'checked',
       'readonly',
       'disabled',
       'multiple',
       'size',
       'maxlength',
       'width',
       'height',
       'rows',
       'cols',
       'alt',
       'title',
       'rel',
       'media',
   ];

    /*
     * TAGS
     */

    public static function tag($name, array $options = [])
    {
        $options = static::renderAttributes($options);
        return "<{$name}{$options}>";
    }

    public static function beginTag($name, array $options = [])
    {
        return self::tag($name, $options);
    }

    public static function endTag($name)
    {
        return "</{$name}>";
    }

    public static function contentTag($name, $content, array $options = [])
    {
        return self::beginTag($name, $options) . self::encode($content) . self::endTag($name);
    }

    /*
     * ATTRIBUTES
     */
    protected static function sortAttribtues(array $options)
    {
        $sorted = [];
        foreach (static::$attributeOrder as $name) {
            if (isset($options[$name])) {
                $sorted[$name] = $options[$name];
            }
        }
        return array_merge($sorted, $options);
    }

    public static function renderAttributes(array $options)
    {
        if (count($options) > 1) {
            $options = self::sortAttribtues($options);
        }

        $ret = "";
        foreach ($options as $attr => $value) {
            if (empty($value)) {
                continue;
            }
            elseif (is_bool($value)) {
                $ret .= " {$attr}";
            }
            elseif ($attr == "style") {
                $ret .= self::renderAttributesStyle($value);
            }
            elseif (in_array($attr, ['data','aria'])) {
                $ret .= self::renderAttributesGroup($attr, $value);
            }
            else {
                $value = self::encode($value);
                $ret .= " {$attr}='{$value}'";
            }
        }

        return $ret;
    }

    public static function renderAttributesStyle($options)
    {
        if (is_string($options)) {
            return " style='{$options}'";
        }

        $ret = "";
        foreach ($options as $name => $value) {
            $value = self::encode($value);
            $ret .= "{$name}: {$value};";
        }
        return " style='{$ret}'";
    }

    public static function renderAttributesGroup($group, array $options)
    {
        $ret = "";
        foreach ($options as $name => $value) {
            $value = self::encode($value);
            $ret .= " {$group}-{$name}='{$value}'";
        }
        return $ret;
    }

    /*
     * ENCODING
     */

    public static function encode($value, $doubleEncode = true)
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, ini_get("default_charset"), $doubleEncode);
    }

    public static function decode($value)
    {
        return htmlspecialchars_decode($content, ENT_QUOTES);
    }
}
