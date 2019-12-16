<?php

use Api\Endpoints\Site;

require __DIR__ . '/../../vendor/autoload.php';

// get current language
$lang = $this->param('lang');

// return API
return Site::API($lang);


