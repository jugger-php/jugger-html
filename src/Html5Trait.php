<?php

namespace jugger\html;

trait Html5Trait
{
    public static function audio($sources, array $options = [])
    {
        $content = self::sourcesList($sources, 'src');
        return self::beginTag('audio', $options) . $content . self::endTag('audio');
    }

    public static function video($sources, array $options = [])
    {
        $content = self::sourcesList($sources, 'src');
        return self::beginTag('video', $options) . $content . self::endTag('video');
    }

    public static function picture($img, $sources, array $options = [])
    {
        $content  = self::sourcesList($sources, 'srcset');
        $content .= $img;
        return self::beginTag('picture', $options) . $content . self::endTag('picture');
    }

    protected static function sourcesList($sources, $attribute = 'src')
    {
        if (!is_array($sources)) {
            $sources = [$sources];
        }

        $ret = "";
        foreach ($sources as $srcOptions) {
            if (!is_array($srcOptions)) {
                $srcOptions = [
                    $attribute => $srcOptions
                ];
            }
            $ret .= self::tag('source', $srcOptions);
        }
        return $ret;
    }
}
