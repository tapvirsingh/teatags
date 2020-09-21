<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\ContainerTags\ExtendedContainers\{HtmlTTag};
use Src\SingleTags\ExtendedTags\{TeaSTag};

// Useage

$tDiv = new TeaSTag('img','ml-5 p-3','data-text="Excellent picture"');

new HtmlTTag($tDiv);
