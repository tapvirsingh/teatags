<?php
// Include the global TTag's configuration file.
require_once('../tta-config.php');

use Src\TTags\{AccordionTTag, HtmlTTag};
// Set the current page.
$ttag_PageName = 'Testing';

$parameters = [
	'accordion-id' => 'accord',
	'data' => [
				[
					'title' => 'Card One',
					'subtitle' => 'description of card one.',
					'text' => 'Detailed description of card one.'
				],
				[
					'title' => 'Card Two',
					'subtitle' => 'description of card two.',
					'text' => 'Detailed description of card two.'
				],
				[
					'title' => 'Card Three',
					'subtitle' => 'description of card Three.',
					'text' => 'Detailed description of card Three.'
				],
			],

];

$accord = new AccordionTTag($parameters);

// Display the navigation and the html within the divs.
new HtmlTTag([$accord]);