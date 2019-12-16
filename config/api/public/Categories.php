<?php

use Api\Endpoints\Categories;

require __DIR__ . '/../../vendor/autoload.php';

// get optionnal param lang
$lang = $this->param('lang');

// return api
return Categories::API($lang);


