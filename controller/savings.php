<?php 

    session_start();

    include_once "db_connector.php";

    $db = new Database();

    
    include_once "../model/user_model.php";

    $deposit = new Register();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if(isset($_POST["deposit_amount"])){
            $type = "Deposit";
            $deposit = $deposit->savings($_POST, $type);

            header("Location: ../view/users/savings.php");
        }

        if(isset($_POSTz"withdraw_submit"])){
            $type = "Withdraw";
            $withdraw = $deposit->savings($_POST, $type);

            header("Location: ../view/users/savings.php");
        }
        
    }

?>