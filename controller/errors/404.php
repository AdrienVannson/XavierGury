<?php
/* Controller */
include_once(__DIR__.'/../../view/error.php');

header('HTTP/1.0 404 Not Found');
show_error('La page demandée n\'existe pas.');
