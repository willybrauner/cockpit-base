<?php

use Api\Controllers\DatasController;

require __DIR__  . '/../../vendor/autoload.php';

// return final build datas API
return (new DatasController())->API();



