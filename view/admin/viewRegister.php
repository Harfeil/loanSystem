<?php 

    // include_once "../../model/user_model.php";
    include_once "../../controller/db_connector.php";

    $db = new Database();
    include_once "../../model/user_model.php";

    $getUsers = new Register();
    include_once "../template/sidebar.php";

?>
        </div>
        

        <div class = "content">
            <h1>List of Accounts</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Account Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                    
                        $where = "";
                        $allUsers = $getUsers->getUsers();

                        $tableDisplay = [];

                        if(empty($allUsers)){
                            $tableDisplay[] = "
                                <td colspan = '6'>No Users Found.</td>
                            ";
                        }else{
                            foreach ($allUsers as $user) {
                                if($user['is_blocked'] == true){
                                    $block_display = "Unblock";
                                }else{
                                    $block_display = "Block";
                                }
                                $tableDisplay[] = "
                                    <tr >
                                        <td>{$user['fname']}</td>
                                        <td>{$user['lname']}</td>
                                        <td>{$user['age']}</td>
                                          <td>{$user['email']}</td>
                                        <td>{$user['account_type']}</td>
                                        <td>{$user['status']}</td>
                                        <td>
                                            <button data-userId='{$user['id']}' data-fname='{$user['fname']}'
                                            data-account_type='{$user['account_type']}' data-lname='{$user['lname']}' data-gender='{$user['gender']}' data-birthday='{$user['birthday']}' data-age='{$user['age']}' data-email='{$user['email']}' data-bankName='{$user['bank_name']}' data-bankNumber='{$user['bank_number']}' data-holderName='{$user['holder_name']}' data-tinNum='{$user['tin_num']}' data-comName='{$user['com_name']}' data-comAdd='{$user['com_address']}' data-comNum='{$user['com_num']}' data-position='{$user['position']}' data-earning='{$user['earning']}' data-proofBill='{$user['proof_bill']}' data-proofId='{$user['proof_id']}' data-proofCoe='{$user['proof_coe']}'type='button' class='btn btn-outline-info showDetailsBtn' >Show Details</button>

                                            <button  data-account_type='{$user['account_type']}'     data-userId='{$user['id']}' data-fname='{$user['fname']}' data-lname='{$user['lname']}' data-gender='{$user['gender']}' data-birthday='{$user['birthday']}' data-age='{$user['age']}' data-email='{$user['email']}' data-bankName='{$user['bank_name']}' data-bankNumber='{$user['bank_number']}' data-holderName='{$user['holder_name']}' data-tinNum='{$user['tin_num']}' data-comName='{$user['com_name']}' data-comAdd='{$user['com_address']}' data-comNum='{$user['com_num']}' data-position='{$user['position']}' data-earning='{$user['earning']}' data-proofBill='{$user['proof_bill']}' data-proofId='{$user['proof_id']}' data-proofCoe='{$user['proof_coe']}' type='button' class='btn btn-outline-primary edit_show_details'>Edit</button>

                                            <button data-userId='{$user['id']}' data-is_blocked='{$user['is_blocked']}' type='button' class='btn btn-outline-danger block_btn'>$block_display</button>
                                        </td>
                                    </tr>";
                            }
                        }

                        

                        $tableContent = implode("\n", $tableDisplay);

                    ?>

                    <?php echo $tableContent; ?>

                </tbody>
            </table>

            <div id="popupForm" class="popup-details">
            
                <div class = "firstRow">
                    <img id = "closeImage" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">

                    <p id = "personalDetail">PERSONAL DETAILS</p>
                    <div class = "">
                        <h6>Account Type</h6>
                        <p id = "account_type">Harfeil</p>
                    </div>
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
                    </div>

                    <div class = "tinId">
                        <h6>TIN ID</h6>
                        <p id = "tinId">1111-111-111-111-11</p>
                    </div>

                    <p id = "companyDetails">COMPANY WORKING WITH DETAILS</p>

                    <div class = "companyName">
                        <h6>COMPANY NAME</h6>
                        <p id = "companyName">GoTyme</p>
                    </div>

                    <div class = "companyAddress">
                        <h6>COMPANY ADDRESS</h6>
                        <p id = "companyAddress">Tungkop Minglanilla Cebu</p>
                    </div>

                    <div class = "companyNumer">
                        <h6>COMPANY NUMBER</h6>
                        <p id = "companyNumer">1111-111-111-111-11</p>
                    </div>

                    <div class = "position">
                        <h6>POSITION</h6>
                        <p id = "position">Back-end Developer   </p>
                    </div>

                    <div class = "earning">
                        <h6>EARNING</h6>
                        <p id = "earning">100k</p>
                    </div>
                    
                    <div class = "proofBillIdContainer">
                        <div class = "billContainer">
                            <h6>PROOF BILL</h6>
                            <div class = "proof_bill">
                                <img width = "345" height = "300" id = "proof_bill" alt="">
                            </div>
                        </div>
                        <div class = "idContainer">
                            <h6>PROOF ID</h6>
                            <div class = "proof_id">
                                <img id = "proof_id" width = "345" height = "300" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <h6>PROOF COE</h6>
                    <div class = "proof_coe">
                        <img width = "345" height = "300" id = "proof_coe" alt="">
                    </div>

                    <form action="../../controller/email_sent.php" method = "POST">
                        <h5>Send Email</h5>
                        <h5>Name</h5>
                        <input type="text" id = "name_display" name = "name_display">
                        <h5>Email</h5>
                        <input type="text" id = "email_display" name = "email_display">
                        <h6>Message</h6>
                        <input type="text" name = "message_email">
                        <input type="submit" name = "submit_email">
                    </form><br>

                    <div class = "buttonContainer">
                        <button type="button" class="btn btn-outline-primary" id = "acceptBtn">Accept</button>
                        <button type="button" class="btn btn-outline-danger" id = "declineBtn">Decline</button>
                    </div>
                </div>

            </div>
            <div id="edit-popupForm" class="popup-details">
            
                <div class = "firstRow">
                    <img id = "closeImageEdit" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">

                    <p id = "personalDetail">PERSONAL DETAILS</p>
                    
                    <form action="../../controller/registration.php" method = "POST">
                        <div class ="fullNameDisplay">
                            <div class = "firstName">
                                <input type="text" id = "id_display" name = "user_id" hidden>
                                <h6>FIRST NAME</h6>
                                <input type="text" id = "fnameInputProfile" name = "f_name">
                            </div>
                            <div class = "lastName">
                                <h6>LAST NAME</h6>
                                <input type="text" id = "lnameInputProfile" name = "l_name">
                            </div>
                        </div>
                        <div class = "genderAgeDisplay">
                            <div class = "gender">
                                <h6>GENDER</h6>
                                <select name="gender" id="genderInputProfile">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class = "birthday">
                                <h6>BIRTHDAY</h6>
                                <input type="date" id = "birthdateInputProfile" name = "birthday">
                            </div>
                            <div class = "age">
                                <h6>AGE</h6>
                                    <input type="text" id = "ageInput" name = "age">
                            </div>
                            <div class = "email">
                                <h6>EMAIL</h6>
                                <input type="text" id = "emailInputProfile" name = "email">
                            </div>
                        </div>
                        <p id = "bankDetailDisplay">BANK DETAILS</p>
                        <div class = "bankDetailContainer">
                            <div class = "bankName">
                                <h6>BANK NAME</h6>
                                <input type="text" id = "banknameInputProfile" name = "bank_name">
                            </div>
                            <div class = "bankNumber">
                                <h6>BANK NUMBER</h6>
                                <input type="text" id = "banknumberInputProfile" name = "bank_number">
                            </div>
                        </div>
                        <div class = "holderName">
                            <h6>HOLDER NAME</h6>
                            <input type="text" id = "holdernameInputProfile" name = "holder_name">
                        </div>

                        <div class = "tinId">
                            <h6>TIN ID</h6>
                            <input type="text" id = "tinidInputProfile" name = "tin_id">
                        </div>

                        <p id = "companyDetails">COMPANY WORKING WITH DETAILS</p>

                        <div class = "companyName">
                            <h6>COMPANY NAME</h6>
                            <input type="text" id = "companyInputProfile" name = "company_name">
                        </div>

                        <div class = "companyAddress">
                            <h6>COMPANY ADDRESS</h6>
                            <input type="text" id = "companyAddressProfile" name = "company_address">
                        </div>

                        <div class = "companyNumer">
                            <h6>COMPANY NUMBER</h6>
                            <input type="text" id = "companyNumberProfile" name = "company_number">
                        </div>

                        <div class = "position">
                            <h6>POSITION</h6>
                            <input type="text" id = "positionProfile" name = "position">
                        </div>

                        <div class = "earning">
                            <h6>EARNING</h6>
                            <input type="text" id = "earningProfile" name = "earning">

                            <h6>Account Type</h6>
                            <select name="accountSelect" id="accountSelect">
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                            </select>
                        </div><br>

                        <div class = "buttonContainer">
                            <button type="submit" class="btn btn-outline-primary" id = "save_btn" name = "confirmEditUser">Save</button>
                            <button name = "" type="submit" class="btn btn-outline-danger" id = "can_btn">Cancel</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
    <script>

        let acceptBtn = document.getElementById("acceptBtn");
        let declineBtn = document.getElementById("declineBtn");

        declineBtn.addEventListener("click", function(){
            let id = this.getAttribute('data-id');
                    
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../controller/registration.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        location.reload();
                    } else {
                        console.error('There was a problem with the request.');
                    }
                }
            };
            
            xhr.send("status_rejected=Rejected&&userId="+id);
        }); 
        
        acceptBtn.addEventListener("click", function(){
            let id = this.getAttribute('data-id');
                    
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../controller/registration.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        location.reload();
                    } else {
                        console.error('There was a problem with the request.');
                    }
                }
            };
            
            xhr.send("status=Active&&userId="+id);
        });

         document.addEventListener('DOMContentLoaded', function(){
            let showBtn =  document.querySelectorAll('.showDetailsBtn');
            let edit_show_details =  document.querySelectorAll('.edit_show_details');
            let block_btn =  document.querySelectorAll('.block_btn');
            block_btn.forEach(function(row) {
                row.addEventListener('click', function() {
                    let user_id = this.getAttribute('data-userId');
                    let is_blocked = this.getAttribute('data-is_blocked');
                    console.log(user_id);

                    let status = false;
                    if(is_blocked == true){
                        status = 0;
                    }else{
                        status = 1;
                    }

                    console.log(status);

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "../../controller/registration.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                location.reload();
                            } else {
                                console.error('There was a problem with the request.');
                            }
                        }
                    };
                    
                    xhr.send("status_blocked="+status+"&&userId="+user_id);
                });
            });
            showBtn.forEach(function(row) {
                row.addEventListener('click', function() {
                    let accptBtn = document.getElementById("acceptBtn");
                    let declineBtn = document.getElementById("declineBtn");
                    let form = document.getElementById("popupForm");
                    let user_id = this.getAttribute('data-userId');
                    let account_type = this.getAttribute('data-account_type');
                    let fname = this.getAttribute('data-fname');
                    let lname = this.getAttribute('data-lname');
                    let gender = this.getAttribute('data-gender');
                    let birthday = this.getAttribute('data-birthday');
                    let age = this.getAttribute('data-age');
                    let email = this.getAttribute('data-email');
                    let bankName = this.getAttribute('data-bankName');
                    let bankNumber = this.getAttribute('data-bankNumber');
                    let holderName = this.getAttribute('data-holderName');
                    let tinNum = this.getAttribute('data-tinNum');
                    let comName = this.getAttribute('data-comName');
                    let comAdd = this.getAttribute('data-comAdd');
                    let comNum = this.getAttribute('data-comNum');
                    let position = this.getAttribute('data-position');
                    let earning = this.getAttribute('data-earning');
                    let proofBill = this.getAttribute('data-proofBill');
                    let proofId = this.getAttribute('data-proofId');
                    let proofCoe = this.getAttribute('data-proofCoe');

                    // Inputs
                    let email_display = document.getElementById("email_display");
                    let name_display = document.getElementById("name_display");
                    let account_typeInput = document.getElementById("account_type");
                    let fnameInput = document.getElementById("firstName");
                    let lnameInput = document.getElementById("lastName");
                    let genderInput = document.getElementById("gender");
                    let birthdayInput = document.getElementById("birthday");
                    let ageInput = document.getElementById("age");
                    let emailInput = document.getElementById("email");
                    let bankNameInput = document.getElementById("bankName");
                    let bankNumberInput = document.getElementById("bankNumber");
                    let holderNameInput = document.getElementById("holderName");
                    let tinIdInput = document.getElementById("tinId");
                    let companyNameInput = document.getElementById("companyName");
                    let companyAddressInput = document.getElementById("companyAddress");
                    let companyNumerInput = document.getElementById("companyNumer");
                    let positionInput = document.getElementById("position");
                    let earningInput = document.getElementById("earning");
                    let proof_billImg = document.getElementById("proof_bill");
                    let proof_idImg = document.getElementById("proof_id");
                    let proof_coeImg = document.getElementById("proof_coe");

                    accptBtn.setAttribute("data-id", user_id);
                    declineBtn.setAttribute("data-id", user_id);
                    name_display.value = fname + " " + lname;
                    email_display.value = email;
                    account_typeInput.textContent = account_type;
                    fnameInput.textContent = fname;
                    lnameInput.textContent = lname;
                    genderInput.textContent = gender;
                    birthdayInput.textContent = birthday;
                    ageInput.textContent = age;
                    emailInput.textContent = email;
                    bankNameInput.textContent = bankName;
                    bankNumberInput.textContent = bankNumber;
                    holderNameInput.textContent = holderName;
                    tinIdInput.textContent = tinNum;
                    companyNameInput.textContent = comName;
                    companyAddressInput.textContent = comAdd;
                    companyNumerInput.textContent = comNum;
                    positionInput.textContent = position;
                    earningInput.textContent = earning;
                    proof_billImg.src = proofBill;
                    proof_idImg.src = proofId;
                    proof_coeImg.src = proofCoe;
                    form.style.display = "block";
                });
            });
             edit_show_details.forEach(function(row) {
                row.addEventListener('click', function() {
                    let account_type = this.getAttribute('data-account_type');
                    let user_id = this.getAttribute('data-userId');
                    let fname = this.getAttribute('data-fname');
                    let lname = this.getAttribute('data-lname');
                    let gender = this.getAttribute('data-gender');
                    let birthday = this.getAttribute('data-birthday');
                    let age = this.getAttribute('data-age');
                    let email = this.getAttribute('data-email');
                    let bankName = this.getAttribute('data-bankName');
                    let bankNumber = this.getAttribute('data-bankNumber');
                    let holderName = this.getAttribute('data-holderName');
                    let tinNum = this.getAttribute('data-tinNum');
                    let comName = this.getAttribute('data-comName');
                    let comAdd = this.getAttribute('data-comAdd');
                    let comNum = this.getAttribute('data-comNum');
                    let position = this.getAttribute('data-position');
                    let earning = this.getAttribute('data-earning');
                    let form = document.getElementById("edit-popupForm");

                    let id_display = document.getElementById("id_display");
                    let fnameInputProfile = document.getElementById("fnameInputProfile");
                    let lnameInputProfile = document.getElementById("lnameInputProfile");
                    let genderInputProfile = document.getElementById("genderInputProfile");
                    let birthdateInputProfile = document.getElementById("birthdateInputProfile");
                    let ageInput = document.getElementById("ageInput");
                    let emailInputProfile = document.getElementById("emailInputProfile");
                    let banknameInputProfile = document.getElementById("banknameInputProfile");
                    let banknumberInputProfile = document.getElementById("banknumberInputProfile");
                    let holdernameInputProfile = document.getElementById("holdernameInputProfile");
                    let tinidInputProfile = document.getElementById("tinidInputProfile");
                    let companyInputProfile = document.getElementById("companyInputProfile");
                    let companyAddressProfile = document.getElementById("companyAddressProfile");
                    let companyNumberProfile = document.getElementById("companyNumberProfile");
                    let positionProfile = document.getElementById("positionProfile");
                    let earningProfile = document.getElementById("earningProfile");

                    id_display.value = user_id
                    fnameInputProfile.value = fname;
                    lnameInputProfile.value = lname;
                    genderInputProfile.value = gender;
                    birthdateInputProfile.value = birthday;
                    ageInput.value = age;
                    emailInputProfile.value = email;
                    banknameInputProfile.value = bankName;
                    banknumberInputProfile.value = bankNumber;
                    holdernameInputProfile.value = holderName;
                    tinidInputProfile.value = tinNum;
                    companyInputProfile.value = comName;
                    companyAddressProfile.value = comAdd;
                    companyNumberProfile.value = comNum;
                    positionProfile.value = position;
                    earningProfile.value = earning;

                    let display = "";
                    if(account_type === "Premium"){
                        display = "Basic";
                    }else{
                        display = "Premium";
                    }

                    const selectElement = document.getElementById('accountSelect');

                    selectElement.options[0].text = account_type;
                    selectElement.options[0].value = account_type;

                    selectElement.options[1].text = display;
                    selectElement.options[1].value = display;
                    
                    form.style.display = "block";
                });
            });
        });
         let imgBtn = document.getElementById("closeImage");
         let closeImageEdit = document.getElementById("closeImageEdit");

         imgBtn.addEventListener("click", function(){
            let form = document.getElementById("popupForm");

            form.style.display = "None";
         });
         closeImageEdit.addEventListener("click", function(){
            let form = document.getElementById("edit-popupForm");

            form.style.display = "None";
         });
    </script>
</body>
</html>