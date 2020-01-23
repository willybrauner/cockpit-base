<?php

use Api\Controllers\HomeController;

require __DIR__ . '/../../vendor/autoload.php';

// return API
return (new HomeController())->API();


