<h3 class="display-4 mb-5">Form Settings</h3>

**Form: example**

The form directory has three sub directories, these are 
<span class = "ttag-dir ml-2"><i class="fas fa-folder"></i> classes</span>
<span class = "ttag-dir ml-2"><i class="fas fa-folder"></i> parameters</span>
<span class = "ttag-dir ml-2"><i class="fas fa-folder"></i> structures</span>. 

Each has a file with the same name that is unique in its directory, identifies the form.
In this case, we are looking at **example form**.

Let us look into the file <span class = "ttag-file"><i class="fas fa-file-code"></i> example.php</span> in these directories.

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> classes</p>**

```php
<?php

return [

	// Set all the elements of the form with these css classes.
	'all' => 'mb-3 mt-3',

	// Set the submit button with these css classes.
	// We dont have to define submit button as it's a 
	// HTML input type.
	// The ones which are not HTML input type, and has
	// some custom name are the ones need to be defined 
	// in structured directory.
	'submit' => 'btn btn-outline-success ttag-signup',

	// We have defined Calculate, Reset and Jump In 
	// button in the structures directory.
	'Calculate' => 'btn btn-outline-success ttag-signup',
	'Reset' => 'btn btn-outline-success ttag-signup',
	'Jump In' => 'btn btn-primary ttag-signup',
];

```

---

**<p class = "ttag-dir"><i class="fas fa-folder"></i> parameters</p>**

```php
<?php

return  [
	// form parameters
	// Unique id of the form.
	'id' => 'example-form',
	'action' => '',
	'method' => 'POST',

	// Form Caption
	'form-caption'=> 'Example Form',
	// Bootstrap or custom CSS classes of form caption.
	'form-caption-classes' => 'display-4 my-5',
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

/*
	Format
	(Caption)|type|reserved fields|(field modifiers)
	
	Please note :
	1. Either 'type' or 'reserved field' must be passed.
	2. Caption and field modifiers are optional.
		Note : if caption is set, then second value must either
		a 'type' or a 'reserved field' and not a field modifier.
	3. unkown types will be considered as text (default).
	4. | (pipes) must be used to separate caption, 
		reserved fields and field modifiers.
	
*/

return [

	// First element is the caption, | is pipe.
	// required, autofocus are the HTML attributes.
	// Incase, the input type is unknown
	// it assigns the type as text.
	// If none is passed as in following case, 
	// it assumes caption to be the type.
	// Provided, it must be one of the input types.
	// As shown bellow.
	
	// Shall take the follow as type text.
	'name|required|autofocus',
	// Type text
	'username|disabled',
	// Type email
	'email|required',
	// Type password
	'password|required',
	// Type date
	'date|required',
	
	'Date of birth|date|required',
	'color|required',
	'Upload File|file|required',
	'Set Range|range|required',

	'Email or Phone|text|disabled',
	// following unkown type will be 
	// shown as text.
	'Some Unkown Type|required',

	// Combo is one type that expects array.
	'Some Field|combo|required'=>[
		// Key is caption and value is value.
		'apples' => 1,
		'oranges'=> 'o',
		'bananas' => 'ban',
		'grapes' => 'g',
	],

	// The hidden input type fields.
	'hides'=>[
		// <input type = "hidden" name ="apples" value = "1">
		'apples' => 1,
		'oranges'=> 'o',
		'bananas' => 'ban',
		'grapes' => 'g',
	],

	// Multiple buttons
	'buttons' => [
		'Calculate',
		'Reset',
	],

	// Custom named field.
	// Note, double qoutes "" are not used
	// with field with spaces.
	'confirm password|password|required',
	'submit',
	'Jump In|submit',
];

```