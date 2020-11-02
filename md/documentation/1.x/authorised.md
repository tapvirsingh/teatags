<h3 class="display-4 mb-5">authorised</h3>

**Category :** `static method`

**Scope :** `TeaTag`

**Returns :** `boolean`

**Overview**

This method sets or gets the authorisation. Use this function to set or get the current status of user login. This function can be used to manage navigation menus and other conditional outputs.

**Usage Syntax**

```php
<?php 

Src\TeaTag::authorised($val = null);


```
<p class = "ttag-code-caption text-muted"><b>TeaTag::authorised()</b> Checking Authorisation</p>

**Parameters**

**`$val`**: Boolean

`true` : User has logged in.

`false` : User has either not logged in or has logged out.


**Checking Authorisation Example**

```php
<?php 

// Namespace
use Src\TeaTag;

if( TeaTag::authorised()){
	// Code when user is logged in.
}else{
	// Code when user is not logged in.
}


```
<p class = "ttag-code-caption text-muted"><b>TeaTag::authorised()</b> Checking Authorisation</p>


**Setting Authorisation Example**

```php
<?php 

// Namespace
use Src\TeaTag;

// Some code before this to authenticate 
// that the user has logged in.
TeaTag::authorised(true);


// Some code before this to authenticate 
// that the user has logged out.
TeaTag::authorised(false);

```
<p class = "ttag-code-caption text-muted"><b>TeaTag::authorised(boolean)</b> Setting Authorisation</p>

