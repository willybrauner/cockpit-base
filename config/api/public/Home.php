<?php

use Api\Endpoints\Home;

require __DIR__ . '/../../vendor/autoload.php';

// get current language
$lang = $this->param('lang');

// return API
return Home::API($lang);


