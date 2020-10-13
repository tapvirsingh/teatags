<h3 class="display-4 mb-5">The Idea and Concept</h3>

The way TTags works is different then you are used to. In the usual way of writing html we move from top to bottom. If you are embedding PHP then most often either you use `echo` or use `<?= ?>` for displaying output. 

However here the things are different. Instead of starting with `<html>`, `<head>`, `<body>`, `<div>` and `<ul>` tags, we first deal with lower ones like `<a>`,`<span>` or `<li>`. Then we move to the next bigger container tag.

Something like this. Please note following code does not use TTags but follow the same idea and concept.

```php
<?php

// First create list items.
$li1 = '<li>Some List Item </li>';
$li2 = '<li>Some List Item 2</li>';
$li3 = '<li>Some List Item 3</li>';

// Then append these in a ul
$ul = '<ul>'.$li1.$li2.$li3.'</ul>';

// Append it in a div
$div = '<div>'.$ul.'</div>';
// Append it in the body
$body = '<body>'.$div.'</body>';
// Append it in the html tag
$html = '<html>'.$body.'</html>';

// Display the page.
echo '<!DOCTYPE html>';
echo $html;

```
<p class = "ttag-code-caption text-muted"><b>basic_idea_concept.php</b> code written in reverse order.</p>

The above code can be rewritten using TTags as following

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

use Src\TTags\{ListTTag,HtmlTTag};

$listItems = ['Some List Item',
            'Some List Item 2',
            'Some List Item 3'];

$list  = new ListTTag($listItems);

new HtmlTTag($list);

```
<p class = "ttag-code-caption text-muted"><b>idea_concept_TTags.php</b> using &lt;ul&gt; and &lt;li&gt;</p>

The idea here is to write minimum and get the maximum. ListTTag here creates and manages `<ul>` and `<li>` tags. 


```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

use Src\TTags\{DivsTTags,HtmlTTag};

$listItems = ['Some List Item',
            'Some List Item 2',
            'Some List Item 3'];

$list  = new DivsTTags($listItems,['col'=>[10,10,10], 'offset'=>1]);

new HtmlTTag($list);

```
<p class = "ttag-code-caption text-muted"><b>idea_concept_TTags.php</b> using &lt;div&gt;</p>

As seen in previous example, *Html output of <b>world_loves_tea.php</b>* which is in the Introduction article, the Html generated using TTags is far better in terms of writing less code and getting the maximum output. 

**Here is a word of caution, you must not use `echo` or try to embed html tags directly in TTag views. The output should be generated only by `new HtmlTTag($list)`. Any direct output will destory the structure of the page.**

For example,


```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

use Src\TTags\{ListTTag,HtmlTTag};

// BAD CODE. DON'T DO THIS.
echo "Some Text";
// BAD CODE. DON'T DO THIS.
?>
<p>This is another bad code, do not do this.</p>
<?php

$listItems = ['Some List Item',
            'Some List Item 2',
            'Some List Item 3'];

$list  = new ListTTag($listItems);

// BAD CODE. DON'T DO THIS.
print "Some Text 2";

new HtmlTTag($list);

```
<p class = "ttag-code-caption text-muted"><b>idea_concept_TTags.php</b> do not print directly</p>

Such a code will print these messages before `<!DOCTYPE html>`. 

You may instead save the output in some variable and let `new HtmlTTag()` handle it for you. Like this.

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

use Src\TTags\{ListTTag,DivsTTags,HtmlTTag};

$echo1 =  "Some Text";

$listItems = ['Some List Item',
            'Some List Item 2',
            'Some List Item 3'];

$list  = new ListTTag($listItems);

$echo2 = "Some Text 2";

$divs = new DivsTTags([$echo1, $echo2,$list],['col'=>[10,10,10], 'offset'=>1]);

new HtmlTTag($divs);
```
<p class = "ttag-code-caption text-muted"><b>idea_concept_TTags.php</b> correct way of writing</p>

Ofcourse, this is not the only way to print the message, there are better ways and we will talk about those later.