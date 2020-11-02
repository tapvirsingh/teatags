<h3 class="display-4 mb-5">DivsTTags</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates multiple nested `<div>` tags depending upon the type of data passed. This class automatically creates bootstrap container, rows, and cols.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{DivsTTags};

// Useage
new DivsTTags($data, $parameters);

```
<p class = "ttag-code-caption text-muted"><b>DivsTTags.php</b></p>


**Parameters**

**`$data` : Mixed**

1. **String :**
A string value can be passed.

2. **Object :**
Object of TTag Classes *(ListTTag, DivTTag, DivsTTags etc)*.

1. **Array :** 
1 or 2 Dimensional array. Depending upon the type of data passed, it organises the divs.


<div class = "ml-5">

Example of 1D Array

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{DivsTTags, HtmlTTag};

// Single dimension array
$data = [
	"Hello World!",
	"The World Loves Tea!",
	"And Loves Coffee Too!",
	"Drink Whatever, but live in peace :)",
	];

//Setting the display parameters, bootstrap's col-10 and offset-1 values.
$parameters = ['col'=>[10,10,10,10],'offset'=>1];

// Using Single Dimension Array.
$divs = new DivsTTags($data, $parameters);

// Createa and display the view page.
new HtmlTTag($divs);

```

<p class = "ttag-code-caption text-muted"><b>eg_1D_DivsTTags.php</b> One dimension example</p>

Example of 2D Array

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{DivsTTags, HtmlTTag};

//  2 dimension array of tea and coffee in stock and sold.
$data = [
		["Green Tea",122,118],
	  	["Red Tea",123,24],
	  	["Assam Tea",63,54],
	  	["Coffee",111,135],
	];

//Setting the display parameters, bootstrap's col-10 and offset-1 values.
$parameters = ['col'=>[
					[6,2,2],
					[6,2,2],
					[6,2,2],
					[6,2,2],
				],
		'offset'=>1];

// Using Single Dimension Array.
$divs = new DivsTTags($data, $parameters);

// Createa and display the view page.
new HtmlTTag($divs);

```

<p class = "ttag-code-caption text-muted"><b>eg_2D_DivsTTags.php</b> Two dimension example</p>


</div>

You may directly pass the *DivsTTags* object to *HtmlTTag* without instantiating it.

Example,

`new HtmlTTag( new DivsTTags($data, $parameters));`

---

**`$parameters` : Array**

Values that can be passed.

1. **`'in-container'`** => `true` <span class="badge badge-dark">Default</span> Creates a container div, i.e. `<div class="container"></div>`. Please note if `null` is passed, it will also be considered as `true`.

2. **`'position'`** => `'r'` <span class="badge badge-dark">Default</span> `'r'` and `'c'` stands for row and column respectively. Works only for single dimensional array. 
When `'r'` is passed the 1D array data is displayed in a row.
When `'c'` is passed the 1D array data is displayed in a column.

3. **`'col'`** => `x` Depending upon the type of data, an integer, 1D array or 2D array of int can be passed. These values signify the bootstrap's `col-x` values. Values of x range from 1 to 12. Refer to Bootstrap's Grid Layout.

4. **`'offset'`** => `x` Same as that of Bootstrap's `offset-x`. Works on all divs.

5. **`'col-classes'`** => [] For multiple cols you may set Bootstrap's or custom classes.

6. **`'extra-row-class'`** => `'abc xyz'` Classes that may be assigned to the row div.	


---

**Methods**

For methods please refer to **Methods** section in documentation.