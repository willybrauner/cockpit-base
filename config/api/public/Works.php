<?php

use Api\Endpoints\Works;

require __DIR__ . '/../../vendor/autoload.php';

// get optionnal param lang
$lang = $this->param('lang');

// return API
return Works::API($lang);



