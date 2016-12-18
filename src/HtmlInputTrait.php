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

    public static function checkbox($name, array $options = [])
    {
        return self::input($name, 'checkbox', $options);
    }

    public static function radio($name, array $options = [])
    {
        return self::input($name, 'radio', $options);
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
