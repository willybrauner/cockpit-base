<?php

use Api\Endpoints\Datas;

require __DIR__ . '/../../vendor/autoload.php';

// get current language
$lang = $this->param('lang');

// return final build datas API
return Datas::API($lang);



