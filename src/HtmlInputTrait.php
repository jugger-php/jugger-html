<?php

namespace jugger\html;

trait HtmlInputTrait
{
    public static function input($name, $type = '', array $options = [])
    {
        $options['name'] = $name;
        $options['type'] = $type;
        return self::tag('input', $options);
    }

    public static function text($name, array $options = [])
    {
        return self::input($name, 'text', $options);
    }

    public static function email($name, array $options = [])
    {
        return self::input($name, 'email', $options);
    }

    public static function number($name, array $options = [])
    {
        return self::input($name, 'number', $options);
    }

    public static function tel($name, array $options = [])
    {
        return self::input($name, 'tel', $options);
    }

    public static function range($name, array $options = [])
    {
        return self::input($name, 'range', $options);
    }

    public static function url($name, array $options = [])
    {
        return self::input($name, 'url', $options);
    }

    public static function checkbox($name, array $options = [])
    {
        return self::input($name, 'checkbox', $options);
    }

    public static function radio($name, array $options = [])
    {
        return self::input($name, 'radio', $options);
    }

    public static function checkboxLabel($name, string $label, array $options = [])
    {
        $labelOptions = [];
        if (isset($options['label'])) {
            $labelOptions = $options['label'];
            unset($options['label']);
        }
        return self::contentTag(
            'label',
            self::input($name, 'checkbox', $options) ." {$label}",
            $labelOptions
        );
    }

    public static function radioLabel($name, string $label, array $options = [])
    {
        $labelOptions = [];
        if (isset($options['label'])) {
            $labelOptions = $options['label'];
            unset($options['label']);
        }
        return self::contentTag(
            'label',
            self::input($name, 'radio', $options) ." {$label}",
            $labelOptions
        );
    }

    public static function checkboxList(string $name, array $values, array $options = [])
    {
        return self::inputsList('checkboxLabel', $name, $values, $options);
    }

    public static function radioList(string $name, array $values, array $options = [])
    {
        return self::inputsList('radioLabel', $name, $values, $options);
    }

    protected static function inputsList(string $type, string $name, array $values, array $options = [])
    {
        $ret = "";
        $checked = (array) ($options['checked'] ?? []);
        unset($options['checked']);
        $isAssoc = array_keys(array_keys($values)) !== array_keys($values);
        foreach ($values as $value => $label) {
            if (!$isAssoc) {
                $value = $label;
            }
            $inputOptions = compact('value');
            if (in_array($value, $checked)) {
                $inputOptions['checked'] = true;
            }
            $ret .= self::$type($name, $label, $inputOptions);
        }
        return self::div($ret, $options);
    }

    public static function file($name, array $options = [])
    {
        return self::input($name, 'file', $options);
    }

    public static function password($name, array $options = [])
    {
        return self::input($name, 'password', $options);
    }

    public static function hidden($name, $value, array $options = [])
    {
        $options['value'] = $value;
        return self::input($name, 'hidden', $options);
    }

    public static function reset($value, array $options = [])
    {
        $options['value'] = $value;
        return self::input(null, 'reset', $options);
    }

    public static function button($value, array $options = [])
    {
        $options['value'] = $value;
        return self::input(null, 'button', $options);
    }

    public static function submit($value, array $options = [])
    {
        $options['value'] = $value;
        return self::input(null, 'submit', $options);
    }
}
