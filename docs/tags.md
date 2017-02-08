# Тэги

Любая HTML страница полностью состоит из тэгов. Каждый тэг страницы является объектом класса `jugger\html\Tag`.
Доступно несколько видов тэгов:

- **Tag** - простой тэг, вся информация в атрибутах
- **ContentTag** - блочный тэг, содержащий информацию внутри блока
- **EmptyTag** - любая строка

Подробнее ниже.

## Про наследование и Барбару

Хотя классы `ContentTag` и `EmptyTag` являются наследниками класса `Tag`, они **не LSP** ([подробнее](https://ru.wikipedia.org/wiki/Принцип_подстановки_Барбары_Лисков)) т.к. имеют разное поведение, а в частности разные конструкторы:

```php
$input = new Tag('input', [
    'options'
]);

$div = new ContentTag('div', 'content', [
    'options'
]);

$empty = new EmptyTag('any content without options');
```

Но все эти классы являются наследником класса `jugger\ui\Widget`, поэтому если вам зачем-то понадобились тэги, то указывать зависимость лучше именно от класса виджета.

## Tag

Каждый тэг представляет из себя виджет `jugger\ui\Widget`, поэтому работать с тэгами можно также как и с виджетами. Ниже представлен пример работы с базовым классом `Tag`:

```php
use jugger\html\Tag;

$tag = new Tag('input');
$content = $tag->render(); // <input>

// приведение к строке
$content = (string) $tag;

// и так можно
echo $tag;
?>

<?= $tag ?>
```

## Атрибуты

Каждый тэг имеет атрибуты. Атрибуты делятся на 3 вида: `групповые`, `стилистические` и остальные.
Работать с ними можно как с обычными свойствами класса:

```php
$tag = new Tag('input');
$tag->type = 'text';
$tag->render(); // <input type='text'>

// или сразу в конструкторе
$tag = new Tag('input', [
    'type' => 'text',
]);
$tag->render(); // <input type='text'>

// boolean атирбуты
$tag = new Tag('input', [
    'checked' => true,
    'selected' => false,
]);
$tag->render(); // <input checked>

// групповые атрибуты: `data` и `aria`
$tag = new Tag('input');
$tag->data = [
    'id' => 123,
    'prop' => [
        'i' => 456,
    ],
    'prop-j' => 789,
];
$tag->aria = [
    'hidden' => true,
];
$tag->render(); // <input data-id='123' data-prop='{&quot;i&quot;:456}' data-prop-j='789' aria-hidden='true'>

// стилистические атрибуты
$tag = new Tag('input');
$tag->style = [
    'color' => 'red',
    'background' => 'white',
];
$tag->render(); // <input style='color:red;background:white;'>
```

Все атрибуты декодируются, а массивы (для обычных атрибутов) преобразуются в JSON строки.

## ContentTag

Блочный тэг (например `div`, `span`, ...) реализован классом `jugger\html\ContentTag`. Работа с атрибутами такая же, как и с простым тэгом, в логике работы есть отличия:

```php
$tag = new ContentTag('span');
$tag->render(); // <span></span>

$tag = new ContentTag('span', 'test');
$tag->render(); // <span>test</span>

$tag = new ContentTag('span', 'test', ['class' => 'text-mute']);
$tag->render(); // <span class='text-mute'>test</span>
```

Также, в отличии от простого тэга, в блочный можно вкладывать другие тэги:

```php
$tag = new ContentTag('div');
$tag->add(new Tag('hr'));
$tag->add(new ContentTag('span', 'test'));
$tag->render(); // <div><hr><span>test</span></div>
```

## EmptyTag

Если от произвольной строки, нужно поведение как у тэга, то на помощь спешит `EmptyTag`:

```php
$tag = new EmptyTag('content');
$tag->render();  // content

$tag = new EmptyTag('c<o>n<t>e<n>t');
$tag->render(); // c<o>n<t>e<n>t
```

Как можно заметить, значение "тэга" никак не преобразуется, поэтому что укажите, то и получите.
