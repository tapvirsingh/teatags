<?php
// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Use HtmlTTag
use Src\ContainerTags\ExtendedContainers\{HtmlTTag};

// Displays Hello World!.
New HtmlTTag('Hello World!');
