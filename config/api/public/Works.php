<?php

use Api\Controllers\WorksController;

require __DIR__ . '/../../vendor/autoload.php';

// return API
return (new WorksController())->API();


