<?php 

    include_once "../../controller/db_connector.php";

    $db = new Database();
    
    include_once "../../model/user_model.php";

    $getBills = new Register();
    include_once "../template/sidebar.php";

?>

        </div>

        <div class="billingsContainer">
            <h1 id = "pageTitle">Billings</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                    
                        $allBills = $getBills->getBillings();

                        $tableDisplay = [];

                        if(empty($allBills)){
                            $tableDisplay[] = "
                                <td colspan = '6'>No Savings Transaction.</td>
                            ";
                        }else{
                            foreach ($allBills as $listBills){
                                $tableDisplay[] = "
                                    <tr>
                                        <td>{$listBills['full_name']}</td>
                                        <td>{$listBills['s_type']}</td>
                                        <td>{$listBills['s_amount']}</td>
                                        <td>{$listBills['s_date']}</td>
                                        <td>{$listBills['s_status']}</td>
                                        <td><button 
                                            type='button' 
                                            class='btn btn-outline-primary show_btn'
                                            data-fname='{$listBills['fname']}'
                                            data-lname='{$listBills['lname']}'  
                                            data-user_id='{$listBills['user_id']}' data-holder_name='{$listBills['holder_name']}'
                                            data-s_id='{$listBills['s_id']}' 
                                            data-s_type='{$listBills['s_type']}'
                                            data-s_amount='{$listBills['s_amount']}'
                                            data-s_status='{$listBills['s_status']}'
                                            data-s_date='{$listBills['s_date']}'
                                            data-bank_number='{$listBills['bank_number']}' 
                                            data-bank_name='{$listBills['bank_name']}'
                                            id = ''>Show Details</button></td>
                                    </tr>";
                            }
                        }
                            

                            $tableContent = implode("\n", $tableDisplay);

                        ?>

                        <?php echo $tableContent; ?>

                </tbody>
            </table>
        </div>

        <div id="popupForm" class="popup-details">

            <img id = "closeImage" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">
            <h3>Loan Form</h3>

                <div class = "firstRow">

                    <p id = "personalDetail">PERSONAL DETAILS</p>
                    
                    <div class ="fullNameDisplay">
                        <div class = "firstName">
                            <h6>FIRST NAME</h6>
                            <p id = "firstName">Harfeil</p>
                        </div>
                        <div class = "lastName">
                            <h6>LAST NAME</h6>
                            <p id = "lastName">Salmeron</p>
                        </div>
                    </div>
                    <p id = "bankDetailDisplay">BANK DETAILS</p>
                    <div class = "bankDetailContainer">
                        <div class = "bankName">
                            <h6>BANK NAME</h6>
                            <p id = "bankName">GoTyme</p>
                        </div>
                    </div>
                    <div class = "holderName">
                        <h6>HOLDER NAME</h6>
                        <p id = "holderName">HARFEIL GEQUILLO SALMERON</p>
                    </div><br><br>
                    <div class = "bankNumber">
                        <h6>BANK NUMBER</h6>
                        <p id = "bankNumber">1111-111-111-111-11</p>
                    </div>

                    <h6>Deposit Amount  </h6>
                    <p id = "display_money">Amount Deposited</p>

                    <form action="../../controller/billings.php" method = "POST">
                        <input type="text" id = "id_display" name = "id_display" hidden>
                        <input required="" placeholder="Enter Deposit" type="text" class="input" name = "deposit_amount"><br><br>
                        <button type="submit" name = "" id = "show_deposit_btn" class="btn btn-outline-primary">Confirm</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            let showBtn =  document.querySelectorAll('.show_btn');
            showBtn.forEach(function(row) {
                row.addEventListener('click', function() {
                    let fname = this.getAttribute('data-fname');
                    let lname = this.getAttribute('data-lname');
                    let user_id = this.getAttribute('data-user_id');
                    let s_id = this.getAttribute('data-s_id');
                    let s_type = this.getAttribute('data-s_type');
                    let s_amount = this.getAttribute('data-s_amount');
                    let s_status = this.getAttribute('data-s_status');
                    let s_date = this.getAttribute('data-s_date');
                    let bank_number = this.getAttribute('data-bank_number');
                    let holder_name = this.getAttribute('data-holder_name');
                    let bank_name = this.getAttribute('data-bank_name');
                    let show_deposit_btn = document.getElementById("show_deposit_btn");

                    if(s_type === "Deposit"){
                        show_deposit_btn.name = "confirm_deposit";
                    }else if (s_type === "Withdraw"){
                        show_deposit_btn.name = "confirm_withdraw";
                    }

                    let firstName_input = document.getElementById("firstName");
                    let lastName_input = document.getElementById("lastName");
                    let bankName_input = document.getElementById("bankName");
                    let holderName_input = document.getElementById("holderName");
                    let bankNumber_input = document.getElementById("bankNumber");
                    let display_money_input = document.getElementById("display_money");
                    let id_display_input = document.getElementById("id_display");


                    firstName_input.textContent = fname;
                    lastName_input.textContent = lname;
                    bankName_input.textContent = bank_name;
                    holderName_input.textContent = bank_name;
                    bankNumber_input.textContent = bank_number;
                    display_money_input.textContent = s_amount;
                    id_display_input.value = s_id;
                    
                    
                    popupForm.style.display = "Block";
                });
            });
            closeImage.addEventListener("click", function(){
                popupForm.style.display = "None";
            });
        });
    </script>
</body>
</html>