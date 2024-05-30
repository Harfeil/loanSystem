<?php 

    session_start();

    include_once "db_connector.php";

    $db = new Database();

    
    include_once "../model/user_model.php";

    $loan = new Register();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if(isset($_POST["confirmLoan"])){
            $type = "Loan";
            $transaction = $loan->transaction($_POST, $type);
        }
    }

   
?>