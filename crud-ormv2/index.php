<?php
ob_start();
session_start();
//require_once 'app_config.php';
require_once 'helpers/common.php';
require_once 'vendor/autoload.php';
require_once 'helpers/autoload.php';
require_once 'constants.php';


//require_once 'src/core/Session.php';

use App\Core\Session;
use \App\Core\Init;

?>






<?php

//Load content 

Init::run();

?>