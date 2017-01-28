<?php

namespace jugger\html;

abstract class Html
{
    public static function encode($value, $doubleEncode = true)
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, ini_get("default_charset"), $doubleEncode);
    }

    public static function decode($value)
    {
        return htmlspecialchars_decode($content, ENT_QUOTES);
    }
}
