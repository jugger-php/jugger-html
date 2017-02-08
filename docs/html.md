# HTML encode/decode

Для кодировая и раскодирования HTML строк, можно использовать простенький объект `jugger\html\Html`:

```php
use jugger\html\Html;

$str = "<test>\"value'\>";
Html::encode($str); // &lt;test&gt;&quot;value&#039;\&gt;
Html::decode($str); // <test>"value'\>

$str = "&nbsp;content&quot;";
Html::encode($str); // &amp;nbsp;content&amp;quot;
Html::decode($str); // &nbsp;content"

$str = "&lt;div>test</div&gt;";
Html::encode($str); // &amp;lt;div&gt;test&lt;/div&amp;gt;
Html::decode($str); // <div>test</div>
```
