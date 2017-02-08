<?php

use PHPUnit\Framework\TestCase;
use jugger\html\Html;

class HtmlTest extends TestCase
{
    public function testBase()
    {
        $str = "<test>\"value'\>";
        $this->assertEquals(Html::encode($str), "&lt;test&gt;&quot;value&#039;\&gt;");
        $this->assertEquals(Html::decode($str),"<test>\"value'\>");

        $str = "&nbsp;content&quot;";
        $this->assertEquals(Html::encode($str), "&amp;nbsp;content&amp;quot;");
        $this->assertEquals(Html::decode($str), "&nbsp;content\"");

        $str = "&lt;div>test</div&gt;";
        $this->assertEquals(Html::encode($str), "&amp;lt;div&gt;test&lt;/div&amp;gt;");
        $this->assertEquals(Html::decode($str), "<div>test</div>");
    }
}
