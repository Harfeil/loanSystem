<?php 

    session_start();
    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getSavings = new Register();

    $sidebar = new Register();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_category'])) {
    $category = $_POST['selected_category'];
    $search = $_POST['search'];

    if(!empty($category) && empty($search)){
        $allsavings = $getSavings->getSavingsUserTransactionWithCategory($category);
    }else if(!empty($category) && !empty($search)){
        $allsavings = $getSavings->getSavingsUserTransactionWithCategoryWithSearch($category, $search);
    }else if(empty($category) && !empty($search)){
        $allsavings = $getSavings->getSavingsUserTransactionWithSearch($search);
    }
    
    else{
        $allsavings = $getSavings->getSavingsUserTransaction();
    }

    if (empty($allsavings)) {
        echo "
            <tr>
                <td colspan='5'>No Transaction</td>
            </tr>";
    } else {
        foreach ($allsavings as $saves) {
            echo "
                <tr>
                    <td>{$saves['s_id']}</td>
                    <td>{$saves['s_type']}</td>
                    <td>{$saves['s_amount']}</td>
                    <td>{$saves['s_status']}</td>
                    <td>{$saves['s_date']}</td>
                </tr>";
        }
    }
    exit();
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


        </div>

        <div class="savingTitle">
    <h1>Savings</h1>

    <div class="filter_container">
        <select name="" id="select_category">
            <option value="">All Category</option>
            <option value="Deposit">Deposit</option>
            <option value="Withdraw">Withdraw</option>
        </select>
        <input type="text" id="search_transaction" placeholder="Search Transaction">
    </div>
    
    <div class="moneyContainer">
        <div class="money">
            <?php 
                $allNotif = $getSavings->getSavings();
                $tableDisplay = [];
                if (empty($allNotif)) {
                    $tableDisplay[] = "<h1 id='savingMoneyDisplay'>0.00</h1>";
                } else {
                    foreach ($allNotif as $notifs) {
                        $tableDisplay[] = "<h1 id='savingMoneyDisplay'>{$notifs['savings']}php</h1>";
                    }
                }

                $tableContent = implode("\n", $tableDisplay);
            ?>
            <?php echo $tableContent; ?>
            <p id="totalSavingLblDisplay">Total Savings</p>
        </div>
        <div class="savingBtnContainer">
            <button id="savingDepositBtn">Deposit</button>
            <button id="savingWithdrawBtn">Withdrawal</button>
        </div>
    </div>

    <div class="savingsTableContainer">
        <?php
        
            echo $_SESSION["savings_error_message"];

        ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody id="result">
                <?php 
                    $allsavings = $getSavings->getSavingsUserTransaction();
                    $tableDisplay = [];

                    if (empty($allsavings)) {
                        $tableDisplay[] = "
                            <tr>
                                <td colspan='6'>No Transaction</td>
                            </tr>";
                    } else {
                        foreach ($allsavings as $saves) {
                            $tableDisplay[] = "
                                <tr>
                                    <td>{$saves['s_id']}</td>
                                    <td>{$saves['s_type']}</td>
                                    <td>{$saves['s_amount']}</td>
                                    <td>{$saves['s_status']}</td>
                                    <td>{$saves['s_date']}</td>
                                </tr>";
                        }
                    }

                    $tableContent = implode("\n", $tableDisplay);
                ?>
                <?php echo $tableContent; ?>
            </tbody>
        </table>
    </div>
</div>
<div id="popupFormDeposit" class="popup-details-deposit">
    <img id="closeImageDeposit" src="../../model/upload/close.png" alt="" width="30px" height="30px">
    <h5>Deposit Form</h5>
    <form action="../../controller/savings.php" method="POST">
        <label for="">Enter Amount:</label><br><br>
        <input type="text" placeholder="100 - 1000" id="depositAmountInput" name="amount_dep"><br><br>
        <button type="submit" name="deposit_amount" class="btn btn-outline-primary">Submit</button>
    </form>
</div>

<div id="popupFormWithdraw" class="popup-details-deposit">
    <img id="closeImageWithdraw" src="../../model/upload/close.png" alt="" width="30px" height="30px">
    <h5>Withdraw Form</h5>
    <form action="../../controller/savings.php" method="POST">
        <label for="">Enter Amount:</label><br><br>
        <input type="text" placeholder="500 - 5000" id="withdrawAmountInput" name="withdraw_amount"><br><br>
        <button type="submit" name="withdraw_submit" class="btn btn-outline-primary">Submit</button>
    </form>
</div>

</div>

<script>
    document.getElementById("savingDepositBtn").addEventListener("click", function(){
        document.getElementById("popupFormDeposit").style.display = "block";
    });

    document.getElementById("savingWithdrawBtn").addEventListener("click", function(){
        document.getElementById("popupFormWithdraw").style.display = "block";
    });

    document.getElementById("closeImageDeposit").addEventListener("click", function(){
        document.getElementById("popupFormDeposit").style.display = "none";
    });

    document.getElementById("closeImageWithdraw").addEventListener("click", function(){
        document.getElementById("popupFormWithdraw").style.display = "none";
    });

    document.addEventListener('DOMContentLoaded', function() {
        var selectCategory = document.getElementById("select_category");
        var search_transaction = document.getElementById("search_transaction");

        selectCategory.addEventListener('change', sendAjaxRequest);
        search_transaction.addEventListener('input', sendAjaxRequest);

            function sendAjaxRequest() {
                var mycategory = selectCategory.value;
                var search = search_transaction.value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            document.getElementById('result').innerHTML = xhr.responseText; // Reattach event listeners after updating the loan list
                        } else {
                            console.error('There was a problem with the request.');
                        }
                    }
                };

                var data = "selected_category=" + encodeURIComponent(mycategory) + "&search=" + encodeURIComponent(search);
                xhr.send(data);
            }
    });
</script>
</body>
</html>