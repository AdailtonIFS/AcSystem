<?php
    include("../config/config.php");
    include('../vendor/autoload.php');
    // include('../routes/web.php');

    $teste = new App\model\Labs;

    var_dump($teste -> GetLabs());