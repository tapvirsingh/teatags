<h3 class="display-4 mb-5">FontAwsmTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates icons of Fontawesome. 

**Usage Syntax**

```php
<?php

$icon = new FontAwsmTTag($iconName, $parameters = null);


```

**Usage Example**

```php
<?php

// Namespace
use Src\TTags\{FontAwsmTTag, HtmlTTag};

$parameters = [
	// Add bootstrap's mr-3 class.
	'class' => 'mr-3',
	'fa-size' => '2x',
	'title' => 'Twitter',
];

// Useage
$twitterIcon = new FontAwsmTTag( 'twitter' , $parameters);

new HtmlTTag($twitterIcon);

//Output 
// <i class="fa fa-2x fa-twitter mr-3" title="Twitter"></i>


```
<p class = "ttag-code-caption text-muted"><b>example.php</b></p>

**Parameters**

**`$iconName` : String**

This parameter takes the name of the fontawesome's icon.

For example, 

`<i class="fa fa-`**`twitter`**`></i>"` will have `twitter` as `$iconName`. 

`<i class="fa fa-`**`home`**`></i>"` will have `home` as `$iconName`. 

---

**`$parameters` : Array**

Values which may be passed.

1. **`'class'`** => Name of extra classes you wish to add. eg `'mr-3'`.

2. 	**`'fa-class'`** => You may use `'fa'` <span class="badge badge-dark">Default</span>, `'fab'` or `'fas'`, depending updon the type of font being used.

3. **`'fa-size'`** => `'1x'` <span class="badge badge-dark">Default</span>, `'2x'`, `'3x'`, `'5x'` or `'7x'`

4. **`'decorative'`** : Boolean => `false` <span class="badge badge-dark">Default</span>. When `true` will set `aria-hidden="true"` attribute. Read more about *Decorative Icons* at [Font Awesome](https://fontawesome.com/how-to-use/on-the-web/other-topics/accessibility).

5. **`'title'`** => Title of the icon, when placed shows tooltip on hover.

6. **`'extra-attrib'`** => Any extra attibutes you wish to add e.g, `'id = "someId"'`.

---

