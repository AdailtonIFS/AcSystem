<?php

#absolute paths
$internalFolder = "AirConditioning";

#absolute url
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$internalFolder}");

#absolute physical path
(substr($_SERVER['DOCUMENT_ROOT'],-1)=="/") ? $bar="": $bar="/";
define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$bar}{$internalFolder}");

#database

define('DBHOST','localhost');
define('DBNAME','airconditioning');
define('DBUSER','root');
define('DBPASSWORD','');