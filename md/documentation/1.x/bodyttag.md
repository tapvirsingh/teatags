<h3 class="display-4 mb-5">BodyTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates the `<body>` tag and then appends the data passed to it. HtmlTTag calls it internally to automatically create the `<body>` tag. 

**Usage**

Although you don't have to use the class as HtmlTTag calls it internally, however, you may require to call if the parameter `$autoCreateBody` while instantiating the class `new HtmlTTag($someHtml,$pageHeaders,`**`$autoCreateBody`**`)` is set to false.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{BodyTTag};

// Useage
new BodyTTag($bodyInnerHtml , $class = null, $extraAttributes = null);

```
<p class = "ttag-code-caption text-muted"><b>BodyTTag.php</b></p>


**Parameters**

**`$bodyInnerHtml` : Mixed**

Values which may be passed.

1. **Object** of TTag Classes *(ListTTag, DivTTag, DivsTTags etc)*.

2. **Single dimensional array** of TTag objects or html. For example, `new BodyTTag([$navbarObject, $divsObject])` or `new BodyTTag([$divHtml, $divHtml2])`.

3. A simple text would also work, for example, `new BodyTTag('The World Loves Tea!')`.

---

**`$class` : String**

This parameter takes custom and bootstrap classes for body tag.

Example,

`$body = new BodyTTag($someHtml, 'p-3 mb-2 bg-light text-dark some-custom-class');`


**`null` :** <span class="badge badge-dark">Default</span> No `class` will be added.

---

**`$extraAttributes ` : Boolean**

Extra attributes other than the `class` attribute. For example, `data-someValue = "xyz"`.

**`null` :** <span class="badge badge-dark">Default</span> No extra attribute will be added.

---

**Methods**

For methods please refer to **Methods** section in documentation.