<h3 class="display-4 mb-5">Form Settings</h3>

**Form: signup**

To understand the complete structure of Form Settings directory, read [FormTTag class](http://localhost/tag/docs/FormTTag) and [example form](http://localhost/tag/docs/frm-example) documentation. This document shows the structure of signup form.

Let us look into the file <span class = "ttag-file"><i class="fas fa-file-code"></i> signup.php</span> in these directories.

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> classes</p>**

```php
<?php

return [
	'all' => 'mb-3 mt-3',
	'Signup' => 'btn btn-primary btn-block',
	'Go to Login' => 'btn btn-link',
];

```

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> parameters</p>**

```php
<?php

return  [
	'id' => 'signup-form',
	'action' => '',
	'method' => 'POST',

	// Form Caption and classes
	'form-caption'=> 'Signup',
	'form-caption-classes' => 'display-4 text-center my-5',
	'form-classes' => 'my-5 pb-4 border-bottom',

	// Add form elements in div.form-group
	'form-group' => false,
];

```

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> structures</p>**

```php
<?php

return [
	'name|required|autofocus',
	'email|required',
	'password|required',
	'Confirm password|password|required',
	'Signup|submit',
	'Go to Login|link=>#home',
];


```