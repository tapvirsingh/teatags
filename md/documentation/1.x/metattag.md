<h3 class="display-4 mb-5">MetaTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

Creates meta tags. This class is being used internally by TTags while creating `<head>` tags.
	
**Usage Syntax**

```php
<?php

$meta = new MetaTTag($attributes);


```

**Usage Example**

```php
<?php

// Namespace
use Src\TTags\{MetaTTag, HtmlTTag};

$attributes ['meta'] = [
					0 => [
						'name' => 'viewport',
						'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no'
					],
					1 => [
						'http-equiv'=>'X-UA-Compatible',
						'content'=>'IE=edge'
					],
				];

// Useage
$meta = new MetaTTag( 'twitter' , $attributes);


```
<p class = "ttag-code-caption text-muted"><b>meta.php</b></p>