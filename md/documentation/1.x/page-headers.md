<b>/ttag-settings/<span class = "ttag-file">page-headers.php</span></b>

```php
<?php

// Page Metadata
// You may add new page headers and meta tags, or overwrite the defaults here.
$ttag_PageHeaders = [
				// 'title'  => $ttag_Title,
				'title'  => TTAG_TITLE,
				'meta' => [
					'keywords' => 'CSS Framework, PHP Framework, Bootstrap Helper',
					'description' => $ttag_Lead,
					// Add the author's name.
					// 'author' => $ttag_Author,
					'author' => TTAG_AUTHOR,
					'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no'
				]
		];
```