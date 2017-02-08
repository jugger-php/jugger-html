<?php

use PHPUnit\Framework\TestCase;
use jugger\html\Tag;
use jugger\html\EmptyTag;
use jugger\html\ContentTag;

class TagTest extends TestCase
{
    public function testAccess()
    {
        $tag = new Tag('input');
        $tag->type = 'text';
        $this->assertEquals(
            $tag->render(),
            "<input type='text'>"
        );

        $tag = new Tag('input', [
            'type' => 'text',
        ]);
        $this->assertEquals(
            $tag->render(),
            "<input type='text'>"
        );
    }

    public function testAttributes()
    {
        $tag = new Tag('input', [
            'type' => 'text'
        ]);
        $this->assertEquals(
            $tag->render(),
            "<input type='text'>"
        );

        $tag = new Tag('input', [
            'checked' => true,
            'selected' => false,
        ]);
        $this->assertEquals(
            $tag->render(),
            "<input checked>"
        );

        $tag = new Tag('input', [
            'data' => [
                'id' => 123,
                'prop' => [
                    'i' => 456,
                ],
                'prop-j' => 789,
            ],
            'aria' => [
                'hidden' => true,
            ],
        ]);
        $this->assertEquals(
            $tag->render(),
            "<input data-id='123' data-prop='{&quot;i&quot;:456}' data-prop-j='789' aria-hidden='true'>"
        );

        $tag = new Tag('input', [
            'style' => [
                'color' => 'red',
                'background' => 'url("img.png") no-repeat',
            ]
        ]);
        $this->assertEquals(
            $tag->render(),
            "<input style='color:red;background:url(&quot;img.png&quot;) no-repeat;'>"
        );
    }

    public function testTag()
    {
        $tag = new Tag('input');
        $this->assertEquals(
            $tag->render(),
            "<input>"
        );

        $tag = new Tag('input');
        $this->assertEquals(
            (string) $tag,
            "<input>"
        );

        $tag = new Tag('input', ['type' => 'text']);
        $this->assertEquals(
            $tag->render(),
            "<input type='text'>"
        );
    }

    public function testContent()
    {
        $tag = new ContentTag('span');
        $this->assertEquals(
            $tag->render(),
            "<span></span>"
        );

        $tag = new ContentTag('span', 'test');
        $this->assertEquals(
            $tag->render(),
            "<span>test</span>"
        );

        $tag = new ContentTag('span', 'test', ['class' => 'text-mute']);
        $this->assertEquals(
            $tag->render(),
            "<span class='text-mute'>test</span>"
        );
    }

    public function testChilds()
    {
        $tag = new ContentTag('div');
        $this->assertEquals(
            $tag->render(),
            "<div></div>"
        );

        $tag = new ContentTag('div');
        $tag->add(new Tag('hr'));
        $tag->add(new ContentTag('span', 'test'));
        $this->assertEquals(
            $tag->render(),
            "<div><hr><span>test</span></div>"
        );
    }

    public function testContentAdvance()
    {
        // shit
        $tag = new ContentTag('div');
        $tag->add(new Tag('hr'));
        $tag->content = 'content';
        $tag->add(new Tag('br'));

        $this->assertEquals(
            $tag->render(),
            "<div>content<hr><br></div>"
        );

        // good
        $tag = new ContentTag('div');
        $tag->add(new Tag('hr'));
        $tag->add(new EmptyTag('content'));
        $tag->add(new Tag('br'));

        $this->assertEquals(
            $tag->render(),
            "<div><hr>content<br></div>"
        );
    }

    public function testEmptyTag()
    {
        $tag = new EmptyTag('content');
        $this->assertEquals(
            $tag->render(),
            "content"
        );

        $tag = new EmptyTag('c<o>n<t>e<n>t');
        $this->assertEquals(
            $tag->render(),
            "c<o>n<t>e<n>t"
        );
    }
}
