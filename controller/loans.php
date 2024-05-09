<?php 

    session_start();

    
    include_once "../model/loan_model.php";

    $loan = new Loan();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if(isset($_POST["amount"])){
            $addLoan = $loan->addLoan($_POST);
        }
    }
?>