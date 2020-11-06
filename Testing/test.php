<?php
// Include the global TTag's configuration file.
require_once('../ttag-config.php');

use Src\TTags\{FormTTag, HtmlTTag};


$fields = [
	'Login' => 'text',
	'Password' => 'password',
	'submit',
];

$parameters = [
	'id' => 'test-form',
];

$form = new FormTTag($fields,$parameters);

// Activate the Home link in the navigation bar.

// Creates the page with default page headers, array composed of
// navbar, jumbotron and div, also auto creates the body tags, 
// and then displays the page.
new HtmlTTag([$form,$div]);
