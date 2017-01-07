<?php

use PHPUnit\Framework\TestCase;
use jugger\html\Html;

class HtmlTest extends TestCase
{
    public function baseProvider()
    {
        return [
            [
                "<tag>",
                Html::tag('tag'),
            ],
            [
                "<tag class='test'>",
                Html::tag('tag', ['class' => 'test']),
            ],
            [
                Html::tag('tag', ['class' => 'test']),
                Html::beginTag('tag', ['class' => 'test']),
            ],
            [
                "</tag>",
                Html::endTag('tag'),
            ],
            [
                "<tag></tag>",
                Html::contentTag('tag', ''),
            ],
            [
                "<tag>content</tag>",
                Html::contentTag('tag', 'content'),
            ],
            [
                "<tag class='test'>content</tag>",
                Html::contentTag('tag', 'content', ['class' => 'test']),
            ],
        ];
    }

    /**
     * @dataProvider baseProvider
     */
    public function testBase($a, $b)
    {
        $this->assertEquals($a, $b);
    }

    public function optionsProvider()
    {
        return [
            [
                "<i class='test' boolean>",
                Html::tag('i', [
                    'class' => 'test',
                    'empty1' => '',
                    'empty2' => null,
                    'empty3' => [],
                    'boolean' => true,
                ]),
            ],
            [
                "<i style='font-size: 14px; color: red'>",
                Html::tag('i', [
                    'style' => 'font-size: 14px; color: red',
                ]),
            ],
            [
                "<i style='font-size: 14px;color: red;'>",
                Html::tag('i', [
                    'style' => [
                        'font-size' => '14px',
                        'color' => 'red',
                    ]
                ]),
            ],
            [
                "<i data-id='1' data-name='test'>",
                Html::tag('i', [
                    'data' => [
                        'id' => 1,
                        'name' => 'test',
                    ],
                ]),
            ],
            [
                "<i aria-hidden='true'>",
                Html::tag('i', [
                    'aria' => [
                        'hidden' => 'true',
                    ],
                ]),
            ],
            [
                "<i class='all' style='color: red;' data-number='one' aria-group='test'>",
                Html::tag('i', [
                    'class' => 'all',
                    'style' => [
                        'color' => 'red',
                    ],
                    'data' => [
                        'number' => 'one',
                    ],
                    'aria' => [
                        'group' => 'test',
                    ],
                ]),
            ],
        ];
    }

    /**
     * @dataProvider optionsProvider
     */
    public function testOptions($a, $b)
    {
        $this->assertEquals($a, $b);
    }

    public function tagsProvider()
    {
        return [
            // a
            [
                "<a href='javascript:void(0)'>test</a>",
                Html::a('test')
            ],
            [
                "<a href='#'>test</a>",
                Html::a('test', '#')
            ],
            // br & hr
            [
                "<br>",
                Html::br()
            ],
            [
                "<hr>",
                Html::hr()
            ],
            // form
            [
                "<form action='url'>",
                Html::form('url')
            ],
            [
                "<form action='url' method='POST'>",
                Html::form('url', ['method' => 'POST'])
            ],
            // img
            [
                "<img src='url'>",
                Html::img('url')
            ],
            [
                "<img src='url' alt='desc'>",
                Html::img('url', 'desc')
            ],
            // input
            [
                "<input name='test'>",
                Html::input('test')
            ],
            [
                "<input type='tel' name='test'>",
                Html::input('test', 'tel')
            ],
            [
                "<input type='text' name='_'>",
                Html::text('_')
            ],
            [
                "<input type='email' name='_'>",
                Html::email('_')
            ],
            [
                "<input type='number' name='_'>",
                Html::number('_')
            ],
            [
                "<input type='tel' name='_'>",
                Html::tel('_')
            ],
            [
                "<input type='range' name='_'>",
                Html::range('_')
            ],
            [
                "<input type='url' name='_'>",
                Html::url('_')
            ],
            [
                "<input type='checkbox' name='_'>",
                Html::checkbox('_')
            ],
            [
                "<input type='radio' name='_'>",
                Html::radio('_')
            ],
            [
                "<input type='file' name='_'>",
                Html::file('_')
            ],
            [
                "<input type='password' name='_'>",
                Html::password('_')
            ],
            [
                "<input type='hidden' name='_' value='123'>",
                Html::hidden('_', 123)
            ],
            [
                "<input type='reset' value='Кнопка'>",
                Html::reset('Кнопка')
            ],
            [
                "<input type='button' value='Кнопка'>",
                Html::button('Кнопка')
            ],
            [
                "<input type='submit' value='Кнопка'>",
                Html::submit('Кнопка')
            ],
            // label
            [
                "<label>test</label>",
                Html::label('test')
            ],
            [
                "<label for='id'>test</label>",
                Html::label('test', 'id')
            ],
            // meta
            [
                "<meta charset='utf-8'>",
                Html::meta('charset', 'utf-8')
            ],
            [
                "<meta name='test' content='123456'>",
                Html::meta('test', 123456)
            ],
            // lists
            [
                "<ul><li>1</li><li>2</li><li>3</li></ul>",
                Html::ul([1,2,3])
            ],
            [
                "<ol><li>1</li><li>2</li><li>3</li></ol>",
                Html::ol([1,2,3])
            ],
            // select
            [
                "<select name='test'><option>1</option><option>2</option><option>3</option></select>",
                Html::select('test', [1,2,3])
            ],
            [
                "<select name='test'><option value='1'>value1</option><option value='2'>value2</option><option value='3'>value3</option></select>",
                Html::select('test', ['1' => 'value1', '2' => 'value2', '3' => 'value3'])
            ],
            [
                "<select name='test'><option>1</option><option selected>2</option><option>3</option></select>",
                Html::select('test', [1,2,3], 2)
            ],
            [
                "<select class='form-control' name='test'><option>1</option><option selected>2</option><option>3</option></select>",
                Html::select('test', [1,2,3], 2, ['class' => 'form-control'])
            ],
            // textarea
            [
                "<textarea name='test'></textarea>",
                Html::textarea('test')
            ],
            [
                "<textarea name='test'>value</textarea>",
                Html::textarea('test', 'value')
            ],
            // HTML5
            [
                "<audio><source src='music.mp3'><source src='music.wmv'><source src='music.ogg'></audio>",
                Html::audio(['music.mp3','music.wmv','music.ogg'])
            ],
            [
                "<video><source src='video.mp4'><source src='video.avi'><source src='video.mpeg'></video>",
                Html::video(['video.mp4','video.avi','video.mpeg'])
            ],
            [
                "<picture><source srcset='pic.svg'><img src='pic.png'></picture>",
                Html::picture(
                    Html::img('pic.png'),
                    ['pic.svg']
                )
            ],
            // other
            [
                "<invalideTag></invalideTag>",
                Html::invalideTag()
            ],
            [
                "<div></div>",
                Html::div()
            ],
            [
                "<div>content</div>",
                Html::div('content')
            ],
            [
                "<div class='container'>content</div>",
                Html::div('content', ['class' => 'container'])
            ],
        ];
    }

    /**
     * @dataProvider tagsProvider
     */
    public function testTags($a, $b)
    {
        $this->assertEquals($a, $b);
    }
}
