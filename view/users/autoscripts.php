<?php

    session_start();
    include_once "../../model/user_model.php";

    
    require_once "../../controller/db_connector.php";
    $db = new Database();

    $getDeadline = new Register();
    
    $disable = $getDeadline->getDeadline();

?>