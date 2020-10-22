<h3 class="display-4 mb-5">SocialTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

Creates social links. It uses the *TTagAppSettings/social.php* settings.
	
**Usage Syntax**

```php
<?php

$social = new SocialTTag($list, $size = 1);

```

**Usage Example**

```php
<?php

// Namespace
use Src\TTags\{SocialTTag, HtmlTTag};

// Useage
$social = new SocialTTag( ['twitter','facebook','github'] , '2x');


```
<p class = "ttag-code-caption text-muted"><b>social.php</b></p>


**Parameters**

**`$list` : Array**

Single dimensional array. It takes the key names from the array defined in *TTagAppSettings/social.php*. 

---

**`$size` : String**

It takes the valid size of the Font Awesome icon. Valid values may be any one from `'1x'`,`'2x'`,`'3x'`,`'5x'` or `'7x'`.

---
