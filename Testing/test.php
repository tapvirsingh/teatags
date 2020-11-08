<?php
// Include the global TTag's configuration file.
require_once('../ttag-config.php');

use Src\TTags\{FormTTag, HtmlTTag};


/*
	Username or Email or Phone => type=text (default)

	Password => type=password

	Login => type=button

*/

// By default if nothing is passed, 
// then it will take the current file's name.
// in this case test.php
$form = new FormTTag('test');

$div = $form->divs([
	'col' => 4, 'offset'=>4
]);

// Activate the Home link in the navigation bar.

// Creates the page with default page headers, array composed of
// navbar, jumbotron and div, also auto creates the body tags, 
// and then displays the page.
new HtmlTTag($div);
