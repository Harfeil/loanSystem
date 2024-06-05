<?php 
    include_once "../template/sidebarUser.php";

    include_once "../../model/user_model.php";
    
    require_once "../../controller/db_connector.php";
    $allLoan = new Register();


?>
    </div>

    <div class = "loanContent">
        <div class = "titleLoan">
            <h1>LOAN HERE</h1>
            <button type="button" class="btn btn-outline-primary" id = "loanBtn">Loan Now</button>
        </div>

        <div class = "loanTableContainer">
            <?php
                echo $_SESSION["loan_error_message"];
            ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Loan Amount</th>
                        <th scope="col">Loan Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $allLoans = $allLoan->getLoansSpecific();
                    $tableDisplay = [];

                    if(empty($allLoans)){
                        $tableDisplay[] = "
                            <tr>
                                <td colspan = '6'>No Loans Found.</td>
                            </tr>";
                    }else{
                        foreach ($allLoans as $loans){
                            if(empty($loans['note'])){
                                $display_note = "None";
                            }else{
                                $display_note = $loans['note'];
                            }
                        $tableDisplay[] = "
                            <tr>
                                <td>{$loans['fullname']}</td>
                                <td>{$loans['loan_money']}</td>
                                <td>{$loans['loan_date']}</td>
                                <td>{$loans['status']}</td>
                                <td>$display_note</td>
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
                <div class = "genderAgeDisplay">
                    <div class = "gender">
                        <h6>GENDER</h6>
                        <p id = "gender">Male</p>
                    </div>
                    <div class = "birthday">
                        <h6>BIRTHDAY</h6>
                        <p id = "birthday">Male</p>
                    </div>
                    <div class = "age">
                        <h6>AGE</h6>
                        <p id = "age">20</p>
                    </div>
                    <div class = "email">
                        <h6>EMAIL</h6>
                        <p id ="email">harfeilsalmeron1@gmail.com</p>
                    </div>
                </div>
                <p id = "bankDetailDisplay">BANK DETAILS</p>
                <div class = "bankDetailContainer">
                    <div class = "bankName">
                        <h6>BANK NAME</h6>
                        <p id = "bankName">GoTyme</p>
                    </div>
                    <div class = "bankNumber">
                        <h6>BANK NUMBER</h6>
                        <p id = "bankNumber">1111-111-111-111-11</p>
                    </div>
                </div>
                <div class = "holderName">
                    <h6>HOLDER NAME</h6>
                    <p id = "holderName">HARFEIL GEQUILLO SALMERON</p>
                </div><br><br>

                <h6>ENTER LOAN AMOUNT</h6>
                <form action="../../controller/registration.php" method = "POST" enctype = "multipart/form-data">
                    <input type="text" id="inputNumberLoan" placeholder="Enter loan amount 5000 - 10000" name = "numberOfAmount"><br><br>
                    <label for="">Set Due Date</label>
                    <select name="month_select" id="month_select">
                        <?php

                            $month_options = $allLoan->getMonthOption();

                            foreach ($month_options as $option) {
                                echo '<option value="' . $option . '">' . $option . ' Months</option>';
                            }

                        ?>
                    </select>
                    <p id = "errorLoanDisplay"></p><br><br><br>
                    <button type="submit" name = "submitAmount"  class = "btn btn-primary" id = "submitLoanAmount">Submit</button>
                </form>
            </div>
        </div>


        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var loanBtn = document.getElementById("loanBtn");
        var closeImage = document.getElementById("closeImage");
        var popupForm = document.getElementById("popupForm");

        loanBtn.addEventListener("click", function() {
            popupForm.style.display = "block";
            console.log("asdasd");
        });

        closeImage.addEventListener("click", function() {
            popupForm.style.display = "none";
        });
    });
</script>
</body>
</html>