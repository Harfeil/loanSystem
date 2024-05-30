<?php 

    include_once "../template/sidebar.php";

    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getNotif = new Register();

    session_start();

?>
    </div>

            <div class = "loanContent">
                <div class = "titleLoan">
                    <h1>Billings</h1>
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
                    <tbody>
                    
                        <?php 
                        
                            $allListLoan = $getNotif->getListLoan();

                            $tableDisplay = [];
                                if(empty($allListLoan)){
                                    $tableDisplay[] = "
                                        <td colspan = '6'>No Loans Found.
                                    </td>";
                                }else{
                                    foreach ($allListLoan as $listLoan){
                                        $tableDisplay[] = "
                                            <tr>
                                                <td>{$listLoan['full_name']}</td>
                                                <td>{$listLoan['loan_money']}</td>
                                                <td>{$listLoan['loan_date']}</td>
                                                <td>{$listLoan['status']}</td>
                                                <td><button 
                                                    type='button' 
                                                    class='btn btn-outline-primary show_btn'
                                                    data-deadline='{$listLoan['deadline']}'
                                                    data-user_id='{$listLoan['user_id']}'
                                                    data-interest='{$listLoan['interest']}'
                                                    data-fname='{$listLoan['fname']}'
                                                    data-lname='{$listLoan['lname']}'
                                                    data-gender='{$listLoan['gender']}'
                                                    data-birthday='{$listLoan['birthday']}'
                                                    data-age='{$listLoan['age']}'
                                                    data-email='{$listLoan['email']}'
                                                    data-bank_name='{$listLoan['bank_name']}'
                                                    data-holder='{$listLoan['holder']}'
                                                    data-loan_money='{$listLoan['loan_money']}'
                                                    data-bank_number='{$listLoan['bank_number']}'
                                                    data-loan_id='{$listLoan['loan_id']}' onclick = 'sendDataToPHP({$listLoan['user_id']})'
                                                >Show Details</button></td>
                                            </tr>";
                                    }
                                }
                                

                                $tableContent = implode("\n", $tableDisplay);

                            ?>

                            <?php echo $tableContent; ?>

                        </tbody>
                    </table>

                <div id="popupForm" class="popup-details">
                    <div class = "loanTableContainer">
                    <img id = "closeImage" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Transaction Type</th>
                                    <th scope="col">Total Payment</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $specific_id = $_SESSION["specific_id"];

                                    echo $specific_id;
                                    $allNotif = $getNotif->getSpecificBills($specific_id);

                                    $tableDisplay = [];

                                    if (empty($allNotif)) {
                                        $tableDisplay[] = "
                                            <td colspan = '6'>No Billings Found</td>";
                                    }else{
                                        foreach ($allNotif as $notifs){
                                        $tableDisplay[] = "
                                            <tr>
                                                <td>{$notifs['full_name']}</td>
                                                <td>{$notifs['type']}</td>
                                                <td>{$notifs['monthly']}</td>
                                                <td>{$notifs['monthly_deadline']}</td>
                                                <td>{$notifs['status']}</td>
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

                
            </div>

        </div>
    </div>

    <script>
         function sendDataToPHP(value) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../controller/retrieve.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText); // Log response from PHP
                    // Handle the response from PHP if needed
                }
            };
            xhr.send('data=' + encodeURIComponent(value)); // Sending data to PHP
            
            popupForm.style.display = "block";
        }

        closeImage.addEventListener("click", function(){
            popupForm.style.display = "none";
        });
    </script>
</body>
</html>