<?php 

    include_once "../template/sidebar.php";
    
    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getNotif = new Register();
    
    $specific_id = $_GET["id"];
    $allListLoan = $getNotif->getSpecificBills($specific_id);

?>

        </div>
        <div class="show_billings_container">
            <h1 id = "billing_summary_display">Billings Summary</h1>

            <div class="details_summary_container">
                <h5>Loan Date</h5>
                <h6>1/20/2024</h6>
                <h5>Full Name</h5>
                <h6>Harfeil Gequillo Salmeron</h6>
                <h5>Account Type</h5>
                <h6>Basic</h6>
                <h5>Loan Amount</h5>
                <h6>10000</h6>
                <h5>Amount Received</h5>
                <h6>10000</h6>
            </div>
             <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Interest</th>
                        <th scope="col">Penalty</th>
                        <th scope="col">Total Payment/Month</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(empty($allListLoan)){
                        echo "<td colspan='5'>No Loans Found.</td>";
                    } else {
                        foreach ($allListLoan as $listLoan){
                            if($listLoan['penalty'] > 0){
                                $listLoan['penalty'] = $listLoan['penalty'];
                            }else{
                                $listLoan['penalty'] = "None";
                            }
                            if($listLoan['status'] === "Not Paid"){
                                $status_display = "Not Paid";
                                $second_status = "Completed";
                                $third_status = "Overdue";
                            }else if($listLoan['status'] === "Overdue"){
                                $status_display = "Overdue";
                                $second_status = "Not Paid";
                                $third_status = "Completed";
                            }else{
                                $status_display = "Completed";
                                $second_status = "Not Paid";
                                $third_status = "Overdue";
                            }
                            echo "
                            <tr>
                                <td>{$listLoan['interest']}</td>
                                <td>{$listLoan['penalty']}</td>
                                <td>{$listLoan['monthly']}</td>
                                <td>{$listLoan['monthly_deadline']}</td>
                                <td>
                                    <select data-monthly = '{$listLoan['monthly']}' data-trans_id = '{$listLoan['trans_id']}' class = 'status_selector'>
                                        <option value =\"$status_display\">$status_display</option>
                                        <option value =\"$second_status\">$second_status</option>
                                        <option value =\"$third_status\">$third_status</option>
                                    </select>
                                </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
                echo "
                    <h5>Total Payment: {$listLoan['total_payment_loan']}</h5>
                    <h5>Due Date: {$listLoan['deadline']}</h5>
                    ";
                    
            ?>
        </div>
    </div>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            let showBtn =  document.querySelectorAll('.status_selector');
            showBtn.forEach(function(row) {
                row.addEventListener('change', function() {
                    let t_id = this.getAttribute("data-trans_id");
                    let monthly = this.getAttribute("data-monthly");
                     if (event.target.classList.contains('status_selector')){
                        var selectedValue = event.target.value;
                    }
                    console.log(selectedValue);
                    console.log(t_id);
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "../../controller/loans.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("status="+selectedValue+"&&t_id="+t_id);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                location.reload();
                            } else {
                                console.error('There was a problem with the request.');
                            }
                        }
                    };
                });
            });
        });
    </script>
</body>
</html>