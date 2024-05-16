<?php 

    include_once "../template/sidebarUser.php";

    include_once "../../controller/db_connector.php";

    $db = new Database();

?>
    </div>

    <div class = "loanContent">
        <div class = "titleLoan">
            <h1>LOAN HERE</h1>
            <button type="button" class="btn btn-outline-primary" id = "loanBtn">Loan Now</button>
        </div>

        <div class = "loanTableContainer">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Loan Amount</th>
                        <th scope="col">Total Payment</th>
                        <th scope="col">Loan Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT CONCAT(user_tbl.fname, ' ', user_tbl.lname) as fullname, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY loan_tbl.loan_id DESC";
                    $allUsers = $db->retrieve($sql);

                    $totalInterest = 0;

                    if ($allUsers && mysqli_num_rows($allUsers) > 0) {
                        while ($row = mysqli_fetch_assoc($allUsers)) {
                            ?>
                            <tr class="showDetailsBtn">
                                <td><?=$row["fullname"]?></td>
                                <td><?=$row["loan_money"]?></td>
                                <td><?=$row["loan_money"] + $row["interest"]?></td>
                                <td><?=$row["loan_date"]?></td>
                                <td><?=$row["status"]?></td>
                            </tr>
                            <?php 
                        }
                    } else {
                        ?>
                        <tr class="showDetailsBtn">
                            <td colspan="4" id = "noLoanfound">No loans found.</td>
                        </tr>
                        <?php 
                    }
                    ?>
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
                    <input type="text" id="inputNumberLoan" placeholder="Enter loan amount 5000 - 10000" name = "numberOfAmount">
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
        });

        closeImage.addEventListener("click", function() {
            popupForm.style.display = "none";
        });
    });
</script>
</body>
</html>