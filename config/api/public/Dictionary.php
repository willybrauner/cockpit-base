<?php

use Api\Endpoints\Dictionary;

require __DIR__ . '/../../vendor/autoload.php';

// get param lang
$lang = $this->param('lang');

// return final API
return Dictionary::API($lang);



