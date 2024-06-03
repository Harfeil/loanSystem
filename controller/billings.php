<?php 

    session_start();

    include_once "db_connector.php";

    $db = new Database();

    
    include_once "../model/user_model.php";

    $deposit = new Register();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if(isset($_POST["confirm_deposit"])){
            $type = "Deposit";
            $deposit = $deposit->updateSavings($_POST, $type);

            header("Location: ../view/admin/saving_transaction.php");
        }

        if(isset($_POST["confirm_withdraw"])){
            $type = "Withdraw";
            $withdraw = $deposit->updateSavings($_POST, $type);
            header("Location: ../view/admin/saving_transaction.php");
        }
    }

?>