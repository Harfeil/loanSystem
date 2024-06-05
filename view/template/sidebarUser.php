<?php 

    session_start();
    
    include_once "../../model/user_model.php";
        
    require_once "../../controller/db_connector.php";

    $sidebar = new Register();
    
    $_SESSION["message"] = "";

    
    if(!isset($_SESSION["user_id"])){
        header("Location: ../../view/login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../model/finalloancss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class = "mainDash">
        <div class = "sideBar"><br>
            <h1>Loan System</h1><br><br>

            <ul class="list-group links">
                
                <?php 
                
                    $side = $sidebar->getSideBar();
                    $sidebarDisplay = "";
                    if($side === "basic"){
                        $sidebarDisplay = "
                            <li class='goLinks'><a id = 'linkColor' href='../users/dashboard.php'> <img id = 'linkColor' height = '30px' width = '30px' src='../../model/upload/dashboard.png' alt=''> Dashboard</a></li>
                            <li class='goLinks'><img height = '30px' width = '30px' src='../../model/upload/loan.png' alt=''> <a href='../../view/users/loanPage.php'>Loan</a></li>
                            <li class='goLinks'><img height = '30px' width = '30px' src='../../model/upload/loan.png' alt=''> <a href='../../view/users/billings.php'>Billings</a></li>
                            <li class='goLinks'><img height = '30px' width = '30px' src='../../model/upload/notification.png' alt=''> <a href='../users/notification.php'>Notifications</a></li>
                            <li class='goLinks'><a href='../../view/users/profile.php'><img height = '30px' width = '30px' src='../../model/upload/profile.png' alt=''> Profile</a></li>
                            <li class='goLinks'><a href='../../view/logout.php'> LogOut</a></li>
                        ";
                    }else if($side === "premium"){
                        $sidebarDisplay = "
                            <li class='goLinks'><a id = 'linkColor' href='../users/dashboard.php'> <img id = 'linkColor' height = '30px' width = '30px' src='../../model/upload/dashboard.png' alt=''> Dashboard</a></li>
                            <li class='goLinks'><img height = '30px' width = '30px' src='../../model/upload/loan.png' alt=''> <a href='../../view/users/loanPage.php'>Loan</a></li>
                            <li class='goLinks'><img height = '30px' width = '30px' src='../../model/upload/loan.png' alt=''> <a href='../../view/users/billings.php'>Billings</a></li>
                            <li class='goLinks'><img height = '30px' width = '30px' src='../../model/upload/save.png' alt=''><a href= '../../view/users/savings.php'> Savings</a></li>
                            <li class='goLinks'><img height = '30px' width = '30px' src='../../model/upload/notification.png' alt=''> <a href='../users/notification.php'>Notifications</a></li>
                            <li class='goLinks'><a href='../../view/users/profile.php'><img height = '30px' width = '30px' src='../../model/upload/profile.png' alt=''> Profile</a></li>
                            <li class='goLinks'><a href='../../view/logout.php'> LogOut</a></li>
                        ";
                    }

                    

                ?>
                <?php echo $sidebarDisplay; ?>
                
            </ul>
