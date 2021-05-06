<h3 class="display-4 mb-5">Form Settings</h3>

**Form: contact**

To understand the complete structure of Form Settings directory, read [FormTTag class](https://teatags.blazehattech.com/docs/FormTTag) and [example form](https://teatags.blazehattech.com/docs/frm-example) documentation. This document shows the structure of contact form.

Let us look into the file <span class = "ttag-file"><i class="fas fa-file-code"></i> contact.php</span> in these directories.

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> classes</p>**

```php
<?php

return [
	// Set all the elements of the form with these css classes.
	'all' => 'mb-3 mt-3',
	// Set the send button with these css classes.
	// Note: we have defined Send button in structures directory.
	'Send' => 'btn btn-primary',
];

```

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> parameters</p>**

```php
<?php

return  [
	// form parameters
	// Unique id of the form.
	'id' => 'query-form',
	'action' => '',
	'method' => 'POST',

	// Form Caption
	'form-caption'=> 'Query',
	// Bootstrap or custom CSS classes of form caption.
	'form-caption-classes' => 'display-4 my-5 text-center',
	//CSS or Bootstrap classes for form body.
	'form-classes' => 'my-5 pb-4 border-bottom',
	
	// Add form elements in div.form-group
	'form-group' => true,

];

```

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> structures</p>**

```php
<?php

return [
	// 'first name',
	// 'last name',
	
	// First element is the caption, | is pipe.
	// required, autofocus are the HTML attributes.
	// Incase, the input type is unknown
	// it assigns the type as text.
	// As shown bellow.
	'name|required|autofocus',
	'email|required',

	// If none is passed as in following case, 
	// it assumes caption to be the type.
	// Provided, it must be one of the input types.
	'phone',

	// Combo is one type that expects array.
	'Query|combo|required' => [
		// Key is caption and value is value.
		'Business' => 'biz',
	],

	// If the second element passed after the caption, is
	// any of the valid input types, it shall create the element
	// of that input type.
	// For example,  
	'message|textarea|rows=4|cols=50|placeholder=Specify your query|required',
	'Send|submit',
];

```