<?php 
    include_once "../../controller/db_connector.php";

    $db = new Database();
    
    include_once "../../model/user_model.php";

    $getListLoan = new Register();

    include_once "../template/sidebar.php";
    

?>

        </div>
        

        <div class = "content">
            <h1 id = "pageTitle">List of Loans</h1>
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
                    
                        $allListLoan = $getListLoan->getListLoan();

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
                                                data-loan_id='{$listLoan['loan_id']}'
                                            >Show Details</button></td>
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
                    </div>
                    <div class = "holderName">
                        <h6>HOLDER NAME</h6>
                        <p id = "holderName">HARFEIL GEQUILLO SALMERON</p>
                    </div><br><br>
                    <div class = "bankNumber">
                        <h6>BANK NUMBER</h6>
                        <p id = "bankNumber">1111-111-111-111-11</p>
                    </div>

                    <h6>REQUESTED AMOUNT</h6>
                    <p id = "display_money">Loan Money</p>

                    <form action="../../controller/loans.php" method = "POST">
                        <input type="text" id = "interest_display" name = "interest" hidden>
                        <input type="text" id = "date_display" name = "date_deadline" hidden>
                        <input type="text" id = "id_display" name = "id_display" hidden>
                        <input required="" placeholder="Enter Loan" type="text" class="input" name = "loanAmount"><br><br>
                        <button type="submit" name = "confirmLoan" class="btn btn-outline-primary">Confirm</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

    <script>

        let details_container = document.getElementById("popupForm");
        let close = document.getElementById("closeImage");

        close.addEventListener("click", function(){
            details_container.style.display = "None";
        });
        
        document.addEventListener('DOMContentLoaded', function(){
            let showdetailBtn = document.querySelectorAll('.show_btn');

            showdetailBtn.forEach(function(row) {
                row.addEventListener('click', function() {
                    let loan_id = this.getAttribute('data-loan_id');
                    let interest = this.getAttribute('data-interest');
                    let fname = this.getAttribute('data-fname');
                    let lname = this.getAttribute('data-lname');
                    let gender = this.getAttribute('data-gender');
                    let birthday = this.getAttribute('data-birthday');
                    let age = this.getAttribute('data-age');
                    let email = this.getAttribute('data-email');
                    let bank_name = this.getAttribute('data-bank_name');
                    let holder = this.getAttribute('data-holder');
                    let loan_money = this.getAttribute('data-loan_money');
                    let bank_number = this.getAttribute('data-bank_number');
                    let deadline = this.getAttribute('data-deadline');

                    let fname_input  = document.getElementById("firstName");
                    let lname_input  = document.getElementById("lastName");
                    let gender_input  = document.getElementById("gender");
                    let birth_input  = document.getElementById("birthday");
                    let age_input  = document.getElementById("age");
                    let email_input  = document.getElementById("email");
                    let bankName_input  = document.getElementById("bankName");
                    let holderName_input  = document.getElementById("holderName");
                    let bankNumber_input  = document.getElementById("bankNumber");
                    let display_money_input  = document.getElementById("display_money");
                    let id_display_input  = document.getElementById("id_display");
                    let date_display_input  = document.getElementById("date_display");
                    let interest_display_input  = document.getElementById("interest_display");

                    interest_display_input.value = interest;
                    date_display_input.value = deadline;
                    fname_input.textContent = fname;
                    lname_input.textContent = lname;
                    gender_input.textContent = gender;
                    birth_input.textContent = birthday;
                    age_input.textContent = age;
                    email_input.textContent = email;
                    bankName_input.textContent = bank_name;
                    holderName_input.textContent = holder;
                    bankNumber_input.textContent = bank_number;
                    display_money_input.textContent = loan_money;
                    id_display_input.value = loan_id;
                    
                    details_container.style.display = "Block";
                });
            });

        });
    </script>
</body>
</html>