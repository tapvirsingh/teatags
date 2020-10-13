<h3 class="display-4 mb-5">ListTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates lists, using `<ul>` and `<li>` tags. The Bootstrap classes used are from List group.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{ListTTag};

// Useage
new ListTTag($list , $parameters = null);

```
<p class = "ttag-code-caption text-muted"><b>ListTTag.php</b></p>


**Parameters**

**`$list` : Array**

Single dimensional array for displaying the list.

Example,

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

---

**`$parameters` : Array**

**`'list-type'`** => `'ul'` <span class="badge badge-dark">Default</span> or `'ol'` 

**`'active'`** => `null` <span class="badge badge-dark">Default</span> or index number of the item to make it active. 

**`'disabled'`** => `null` <span class="badge badge-dark">Default</span> or [] array of disabled item indexes.

---

