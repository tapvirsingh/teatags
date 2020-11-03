<?php
// Include the global TTag's configuration file.
require_once('../ttag-config.php');

// Use HtmlTTag.
use Src\TTags\{HtmlTTag};

// Displays The World Loves Tea!.
new HtmlTTag('The World Loves Tea!');