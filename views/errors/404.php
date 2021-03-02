<?php

// Include the global TTag's configuration file.
require_once('../../ttag-config.php');

use Src\TTags\{JumboTTag,  HtmlTTag};

// Do not show the footer.
$ttag_FooterConf['showFooter'] = false;

// Create auto divs.
$jumbo = new JumboTTag( [
                'head' => 'Oh no! 404!',
                'lead' => 'The page you are looking for does not exist on this planet. You may do either of the following.',
                 // Buttons 
                'buttons' => [
                    'Home' => [ttag_IndexView(),'btn btn-outline-light btn-lg m-4'],
                    'Documentation' => [ttag_View('documentation'),'btn btn-warning btn-lg'],
                ]
            ],
            [//$parameters
            	'jumboClasses' => 'm-0 vh-100',
                'bg-image' => '404.png',
                'align' => 'center',
                'lead-class' => 'col-8 offset-2 text-light mb-5',
                'head-class' => 'text-light',
                'head-size' => 'display-1',

            ] );

// Display the navigation and the html within the divs.
new HtmlTTag($jumbo);