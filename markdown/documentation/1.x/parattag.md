
<h3 class="display-4 mb-5">ParaTTag</h3>

**Category :** `class`

```php
namespace Src\TTags;
```

**Overview**

It creates the `<p>` tag and then appends the data passed to it.
	

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{ParaTTag};

// Useage
new ParaTTag($textOrHtml ,$class =null,$extraAttribute = null);

```
<p class = "ttag-code-caption text-muted"><b>ParaTTag.php</b></p>


**Parameters**

**`$textOrHtml` : String**

Text or html can be passed.

---

**`$class` : String**

This parameter takes custom and bootstrap classes.

Example,

`$p = new ParaTTag($someHtml, 'p-3 mb-2 bg-light text-dark some-custom-class');`


**`null` :** <span class="badge badge-dark">Default</span> No `class` will be added.

---

**`$extraAttributes ` : Boolean**

Extra attributes other than the `class` attribute. For example, `data-someValue = "xyz"`.

**`null` :** <span class="badge badge-dark">Default</span> No extra attribute will be added.

---
