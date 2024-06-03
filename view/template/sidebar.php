<?php

     session_start();
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../model/loanmyloancss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class = "mainDash">
        <div class = "sideBar"><br>
            <h1>Loan System</h1><br><br>

            <ul class="list-group links">
                <li class="goLinks"><a id = "linkColor" href="../admin/dashboard.php"> <img id = "linkColor" height = "30px" width = "30px" src="../../model/upload/dashboard.png" alt=""> Dashboard</a></li>
                <li class="goLinks"><img height = "30px" width = "30px" src="../../model/upload/loan.png" alt=""> <a href="../admin/listloan.php">Loans</a></li>
                <li class="goLinks"><img height = "30px" width = "30px" src="../../model/upload/users.png" alt=""> <a href="../admin/viewRegister.php">Users</a></li>
                <li class="goLinks"><img height = "30px" width = "30px" src="../../model/upload/users.png" alt=""> <a href="../admin/billings.php">Billings</a></li>
                <li class="goLinks"><img height = "30px" width = "30px" src="../../model/upload/withdraw.png" alt=""> <a href="../admin/saving_transaction.php">Savings</a></li>
                <li class="goLinks"><img height = "30px" width = "30px" src="../../model/upload/transactionIcon.png" alt=""> <a href="../admin/total_company.php">Company Income</a></li>
            </ul>
