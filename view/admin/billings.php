<?php
include_once "../../controller/db_connector.php";
include_once "../../model/user_model.php";

$getNotif = new Register();

session_start();

// Check if it's a POST request and 'month' and 'year' are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['month']) || isset($_POST['year'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];

   if (!empty($month) && !empty($year)) {
        $allListLoan = $getNotif->getAcceptedLoanFilter($month, $year);
    } elseif (!empty($month)) {
        $allListLoan = $getNotif->getAcceptedLoanFilterMonth($month);
    } elseif (!empty($year)) {
        $allListLoan = $getNotif->getAcceptedLoanFilterYear($year);
    } else if (empty($month) && empty($year)) {
        $allListLoan = $getNotif->getAcceptedLoan();
    }

    if (empty($allListLoan)) {
        echo "<td colspan='5'>No Loans Found.</td>";
    } else {
        foreach ($allListLoan as $listLoan) {
            echo "
            <tr>
                <td>{$listLoan['full_name']}</td>
                <td>{$listLoan['loan_money']}</td>
                <td>{$listLoan['loan_date']}</td>
                <td>{$listLoan['status']}</td>
                <td>
                    <button type='button' class='btn btn-outline-primary show_btn_details' data-loan_id='{$listLoan['loan_id']}'>Show Details
                    </button>
                </td>
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
    <div class="mainDash">
        <div class="sideBar">
            <br>
            <h1>Loan System</h1>
            <br><br>
            <ul class="list-group links">
                <li class="goLinks"><a id="linkColor" href="../admin/dashboard.php"> <img id="linkColor" height="30px" width="30px" src="../../model/upload/dashboard.png" alt=""> Dashboard</a></li>
                <li class="goLinks"><img height="30px" width="30px" src="../../model/upload/loan.png" alt=""> <a href="../admin/listloan.php">Loans</a></li>
                <li class="goLinks"><img height="30px" width="30px" src="../../model/upload/users.png" alt=""> <a href="../admin/viewRegister.php">Users</a></li>
                <li class="goLinks"><img height="30px" width="30px" src="../../model/upload/users.png" alt=""> <a href="../admin/billings.php">Billings</a></li>
                <li class="goLinks"><img height="30px" width="30px" src="../../model/upload/withdraw.png" alt=""> <a href="../admin/saving_transaction.php">Savings</a></li>
                <li class="goLinks"><img height="30px" width="30px" src="../../model/upload/transactionIcon.png" alt=""> <a href="../admin/total_company.php">Company Income</a></li>
            </ul>
        </div>
        <div class="loanContent">
            <div class="titleLoan">
                <h1>Billings</h1>
                <select name="months" id="months">
                    <option value="">This Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="years" id="years">
                    <option value="">This Year</option>
                    <?php
                    $startYear = 2000;
                    $endYear = date("Y");

                    for ($year = $startYear; $year <= $endYear; $year++) {
                        echo "<option value=\"$year\">$year</option>";
                    }
                    ?>
                </select>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Loan Amount</th>
                        <th scope="col">Loan Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    $allListLoan = $getNotif->getAcceptedLoan();
                    if(empty($allListLoan)){
                        echo "<td colspan='5'>No Loans Found.</td>";
                    } else {
                        foreach ($allListLoan as $listLoan){
                            echo "
                            <tr>
                                <td>{$listLoan['full_name']}</td>
                                <td>{$listLoan['loan_money']}</td>
                                <td>{$listLoan['loan_date']}</td>
                                <td>{$listLoan['status']}</td>
                                <td>
                                    <button type='button' class='btn btn-outline-primary show_btn'
                                    data-loan_id='{$listLoan['loan_id']}'>Show Details
                                    </button>
                                </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
            function attachEventListeners() {
                let showBtn = document.querySelectorAll('.show_btn');
                showBtn.forEach(function(row) {
                    row.addEventListener('click', function() {
                        let id = this.getAttribute("data-loan_id");
                        window.location.href = "show_billings.php?id=" + id;
                    });
                });

                let show_btn_details = document.querySelectorAll('.show_btn_details');
                show_btn_details.forEach(function(row) {
                    row.addEventListener('click', function() {
                        let id = this.getAttribute("data-loan_id");
                        window.location.href = "show_billings.php?id=" + id;
                    });
                });
            }

            attachEventListeners();

            var monthSelect = document.getElementById('months');
            var yearSelect = document.getElementById('years');

            monthSelect.addEventListener('change', sendAjaxRequest);
            yearSelect.addEventListener('change', sendAjaxRequest);

            function sendAjaxRequest() {
                var month = monthSelect.value;
                var year = yearSelect.value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            document.getElementById('result').innerHTML = xhr.responseText;
                            attachEventListeners();  // Reattach event listeners after updating the loan list
                        } else {
                            console.error('There was a problem with the request.');
                        }
                    }
                };

                var data = "month=" + encodeURIComponent(month) + "&year=" + encodeURIComponent(year);
                xhr.send(data);
            }
        });
    </script>
</body>
</html>
