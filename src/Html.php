<?php

namespace jugger\html;

abstract class Html extends BaseHtml
{
    use Html5Trait;
    use HtmlInputTrait;

    public static function a($content, $href = 'javascript:void(0)', array $options = [])
    {
        $options['href'] = $href;
        return self::contentTag('a', $content, $options);
    }

    public static function br()
    {
        return "<br>";
    }

    public static function form($action = '', array $options = [])
    {
        $options['action'] = $action;
        return self::beginTag('form', $options);
    }

    public static function hr()
    {
        return "<hr>";
    }

    public static function img($src, $alt = '', array $options = [])
    {
        $options['src'] = $src;
        $options['alt'] = $alt;
        return self::tag('img', $options);
    }

    public static function input($name, $type = '', array $options = [])
    {
        $options['name'] = $name;
        $options['type'] = $type;
        return self::tag('input', $options);
    }

    public static function label($content, $for = '', array $options = [])
    {
        $options['for'] = $for;
        return self::contentTag('label', $content, $options);
    }

    public static function meta($name, $value, array $options = [])
    {
        if ($name == 'charset') {
            $options['charset'] = $value;
        }
        else {
            $options['name'] = $name;
            $options['content'] = $value;
        }
        return self::tag('meta', $options);
    }

    protected static function list($type, array $values, array $options = [])
    {
        $content = "";
        foreach ($values as $li) {
            $content .= self::li($li);
        }
        return self::beginTag($type, $options) . $content . self::endTag($type);
    }

    public static function ul(array $values, array $options = [])
    {
        return self::list('ul', $values, $options);
    }

    public static function ol(array $values, array $options = [])
    {
        return self::list('ol', $values, $options);
    }

    public static function select(string $name, array $values, string $selectedValue = null, array $options = [])
    {
        $content = "";
        $keys = array_keys($values);
        $isAssoc = array_keys($keys) !== $keys;
        foreach ($values as $key => $value) {
            if ($isAssoc) {
                $selected = $key == $selectedValue;
                $content .= self::option($value, $key, $selected);
            }
            else {
                $selected = $value == $selectedValue;
                $content .= self::option($value, "", $selected);
            }
        }
        $options = array_merge(['name' => $name], $options);
        return self::beginTag('select', $options) . $content . self::endTag('select');
    }

    public static function option(string $label, string $value = null, bool $selected = false)
    {
        $options = [
            'selected' => $selected,
            'value' => empty($value) ? null : $value,
        ];
        return self::contentTag("option", $label, $options);
    }

    public static function textarea($name, $value = '', array $options = [])
    {
        $options['name'] = $name;
        return self::contentTag('textarea', $value, $options);
    }

    /**
     * Для остальных тегов, в том числе и несуществующих
     * @param  string $name имя тэга
     * @param  array  $args аргументы
     * @return string       HTML код
     */
    public static function __callStatic(string $name, array $args)
    {
        $content = $args[0] ?? "";
        $options = $args[1] ?? [];

        return self::contentTag($name, $content, $options);
    }
}
