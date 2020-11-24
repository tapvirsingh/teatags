<?php
// Include the global TTag's configuration file.
require_once('../ttag-config.php');

use Src\TTags\{FormTTag, HtmlTTag};

// Load signup form.
$form = new FormTTag('signup');

$div = $form->divs([
	'col' => 4, 'offset'=>4
]);

// Activate the Home link in the navigation bar.

// Creates the page with default page headers, array composed of
// navbar, jumbotron and div, also auto creates the body tags, 
// and then displays the page.
new HtmlTTag($div);
