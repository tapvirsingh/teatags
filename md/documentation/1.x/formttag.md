<h3 class="display-4 mb-5">FormTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```

**Overview**

It creates responsive forms. 

The form must be defined in three directories within the TTag's form settings directory. The name of the form must have the same name as that of those three files.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{FormTTag};

// Useage
new FormTTag($formName);

```
<p class = "ttag-code-caption text-muted"><b>FormTTag.php</b></p>


**Parameters**

**`$formName` : String**

Form and file containing the structure, parameters and classes must have the same name.

**ttag-settings**

The form has a specific structure with strict naming conventions.

The <span class = "ttag-dir">/ttag-settings/forms/</span> has three sub directories.

These are
<span class = "ttag-dir ml-2"><i class="fas fa-folder"></i> classes</span>
<span class = "ttag-dir ml-2"><i class="fas fa-folder"></i> parameters</span>
<span class = "ttag-dir ml-2"><i class="fas fa-folder"></i> structures</span>.

---

**Details**

**<span class = "ttag-dir"><i class="fas fa-folder"></i> classes</span>**

Contains the classes for form elements, for example, `'all' => 'mb-3 mt-3'`,
	`'Login' => 'btn btn-primary btn-block'`.

**<span class = "ttag-dir"><i class="fas fa-folder"></i> parameters</span>**

Contains parameters of the form.

```php

<?php

return  [
	'id' => 'login-form',
	'action' => '',
	'method' => 'POST',

	// Form Caption and classes
	'form-caption'=> 'Login',
	'form-caption-classes' => 'display-4 my-5 text-center',
	'form-classes' => 'my-5 pb-4 border-bottom',

	// Add form elements in div.form-group
	'form-group' => false,
];

```
<p class = "ttag-code-caption text-muted"><b>Example of login.php in parameters</b></p>

**<span class = "ttag-dir"><i class="fas fa-folder"></i> structures</span>**

This defines the structure of the form.

```php

<?php

return [
	'Email or phone|required|autofocus',
	'password|required',
	'Login|submit',
	'New Signup|submit',
	'Forgot password|link=>#some-link',
	// 'Help|link=>#help',
];

```
<p class = "ttag-code-caption text-muted"><b>Example of login.php in structures</b></p>


Another example,


```php

<?php

return [
	'Email or phone|required|autofocus',
	'password|required',
	'Login|submit',
	'New Signup|submit',
	'Forgot password|link=>#some-link',
	// 'Help|link=>#help',
];

```
<p class = "ttag-code-caption text-muted"><b>Example of login.php in structures</b></p>

All the directories are in lower case.

Name the form correctly defining its purpose.
For example, 

<p class = "ttag-file"><i class="fas fa-file-code"></i> login.php</p>

and 

<p class = "ttag-file"><i class="fas fa-file-code"></i> signup.php</p> 

This makes clear the type and purpose of the form. The names must be the same across all the <span class = "ttag-dir">/ttag-settings/forms/</span> directories.



