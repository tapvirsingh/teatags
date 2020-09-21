<h3 class="display-4 mb-5">DivTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates the `<div>` tag and then appends the data passed to it.

**Note**

The first parameter is not `$dataToAppend`, it is the bootstrap or custom class you wish to append.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{DivTTag};

// Useage
new DivTTag($class, $dataToAppend, $extraAttribute = null);

```
<p class = "ttag-code-caption text-muted"><b>DivTTag.php</b></p>


**Parameters**

**`$class` : String**

This parameter takes custom and bootstrap classes for `<div>` tag.

Example,

`$div = new DivTTag('p-3 col-10 offset-1 some-custom-class', $dataToAppend);`


**`null` :** No `class` will be added.

---

**`$dataToAppend` : Mixed**

Values which may be passed.

1. **Object** of TTag Classes *(ListTTag, DivTTag, DivsTTags etc)*.

2. **Single dimensional array** of TTag objects or html. For example, `new DivTTag([$navbarObject, $divsObject])` or `new DivTTag([$divHtml, $divHtml2])`.

3. A simple text would also work, for example, `new DivTTag('The World Loves Tea!')`.

---

**`$extraAttributes ` : Boolean**

Extra attributes other than the `class` attribute. For example, `data-someValue = "xyz"`.

**`null` :** <span class="badge badge-dark">Default</span> No extra attribute will be added.

---

**Methods**

For methods please refer to **Methods** section in documentation.