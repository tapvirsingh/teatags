<h3 class="display-4 mb-5">Form Settings</h3>

**Form: login**

To understand the complete structure of Form Settings directory, read [FormTTag class](https://teatags.blazehattech.com/docs/FormTTag) and [example form](https://teatags.blazehattech.com/docs/frm-example) documentation. This document shows the structure of login form.

Let us look into the file <span class = "ttag-file"><i class="fas fa-file-code"></i> login.php</span> in these directories.

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> classes</p>**

```php
<?php

return [
	'all' => 'mb-3 mt-3',
	'Login' => 'btn btn-primary btn-block',
	'New Signup' => 'btn btn-outline-success btn-block ',
	'Forgot password' => 'btn btn-link btn-block text-left',
	'Help' => 'btn btn-link',
];

```

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> parameters</p>**

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

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> structures</p>**

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