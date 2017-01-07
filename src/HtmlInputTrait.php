<?php

namespace jugger\html;

trait HtmlInputTrait
{
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

    public static function checkbox($name, string $label = null, array $options = [])
    {
        if ($label) {
            $label = self::encode($label);
            return "<label>". self::input($name, 'checkbox', $options) ." {$label}</label>";
        }
        else {
            return self::input($name, 'checkbox', $options);
        }
    }

    public static function checkboxList(string $name, array $values, array $options = [])
    {
        $ret = "";
        foreach ($values as $value => $label) {
            $ret .= self::checkbox($name, $label, compact('value'));
        }
        return self::div($ret, $options);
    }

    public static function radio($name, string $label = null, array $options = [])
    {
        if ($label) {
            $label = self::encode($label);
            return "<label>". self::input($name, 'radio', $options) ." {$label}</label>";
        }
        else {
            return self::input($name, 'radio', $options);
        }
    }

    public static function radioList(string $name, array $values, array $options = [])
    {
        $ret = "";
        foreach ($values as $value => $label) {
            $ret .= self::radio($name, $label, compact('value'));
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
