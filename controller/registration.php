<?php

    include_once "../model/user_model.php";

    $register = new Register();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $registerUser = $register->addUser($_POST, $_FILES);
        
    }


?>