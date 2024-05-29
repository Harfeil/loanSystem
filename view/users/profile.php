<?php 

    include_once "../template/sidebarUser.php";
    
    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getUsers = new Register();

    $allUsers = $getUsers->getSpecificUser();

    $tableDisplay = [];

    session_destroy();
?>

        </div>

        <div class='profile_container'>

        <?php 
        
            foreach ($allUsers as $user) {
                $tableDisplay[] = "

                

                    <h1>Profile</h1>

                    <div class = 'inner_profile'>


                        <div class='btn_container'>
                            <button data-userId='{$user['id']}' data-fname='{$user['fname']}' data-lname='{$user['lname']}' data-gender='{$user['gender']}' data-birthday='{$user['birthday']}' data-age='{$user['age']}' data-email='{$user['email']}' data-bankName='{$user['bank_name']}' data-bankNumber='{$user['bank_number']}' data-holderName='{$user['holder_name']}' data-tinNum='{$user['tin_num']}' data-comName='{$user['com_name']}' data-comAdd='{$user['com_address']}' data-comNum='{$user['com_num']}' data-position='{$user['position']}' data-earning='{$user['earning']}' data-proofBill='{$user['proof_bill']}' data-proofId='{$user['proof_id']}' data-proofCoe='{$user['proof_coe']}'  type='button' id = 'editProfileBtn' class='btn btn-outline-primary edit_button'>Edit Profile</button>
                        </div>

                        <p id = 'personalDetail'>PERSONAL DETAILS</p>
                        
                        <div class ='fullNameDisplay'>
                            <div class = 'firstName'>
                                <h6>FIRST NAME</h6>
                                <p id = 'firstName'>{$user['fname']}</p>
                            </div>
                            <div class = 'lastName'>
                                <h6>LAST NAME</h6>
                                <p id = 'lastName'>{$user['lname']}</p>
                            </div>
                        </div>
                        <div class = 'genderAgeDisplay'>
                            <div class = 'gender'>
                                <h6>GENDER</h6>
                                <p id = 'gender'>{$user['gender']}</p>
                            </div>
                            <div class = 'birthday'>
                                <h6>BIRTHDAY</h6>
                                <p id = 'birthday'>{$user['birthday']}</p>
                            </div>
                            <div class = 'age'>
                                <h6>AGE</h6>
                                <p id = 'age'>{$user['age']}</p>
                            </div>
                            <div class = 'email'>
                                <h6>EMAIL</h6>
                                <p id ='email'>{$user['email']}</p>
                            </div>
                        </div>
                        <p id = 'bankDetailDisplay'>BANK DETAILS</p>
                        <div class = 'bankDetailContainer'>
                            <div class = 'bankName'>
                                <h6>BANK NAME</h6>
                                <p id = 'bankName'>{$user['bank_name']}</p>
                            </div>
                            <div class = 'bankNumber'>
                                <h6>BANK NUMBER</h6>
                                <p id = 'bankNumber'>{$user['bank_number']}</p>
                            </div>
                        </div>
                        <div class = 'holderName'>
                            <h6>HOLDER NAME</h6>
                            <p id = 'holderName'>{$user['holder_name']}</p>
                        </div>

                        <div class = 'tinId'>
                            <h6>TIN ID</h6>
                            <p id = 'tinId'>{$user['tin_num']}</p>
                        </div>

                        <p id = 'companyDetails'>COMPANY WORKING WITH DETAILS</p>

                        <div class = 'companyName'>
                            <h6>COMPANY NAME</h6>
                            <p id = 'companyName'>{$user['com_name']}</p>
                        </div>

                        <div class = 'companyAddress'>
                            <h6>COMPANY ADDRESS</h6>
                            <p id = 'companyAddress'>{$user['com_address']}</p>
                        </div>

                        <div class = 'companyNumer'>
                            <h6>COMPANY NUMBER</h6>
                            <p id = 'companyNumer'>{$user['com_num']}</p>
                        </div>

                        <div class = 'position'>
                            <h6>POSITION</h6>
                            <p id = 'position'>{$user['position']}</p>
                        </div>

                        <div class = 'earning'>
                            <h6>EARNING</h6>
                            <p id = 'earning'>{$user['earning']}</p>
                        </div>
                        
                        <div class = 'proofBillIdContainer'>
                            <div class = 'billContainer'>
                                <h6>PROOF BILL</h6>
                                <div class = 'proof_bill'>
                                    <img width = '345' src = '{$user['proof_bill']}'  height = '300' id = 'proof_bill' alt=''>
                                </div>
                            </div>
                            <div class = 'idContainer'>
                                <h6>PROOF ID</h6>
                                <div class = 'proof_id'>
                                    <input id = 'proof_idSrc' type = 'text' value = '{$user['proof_id']}' hidden>
                                    <img id = 'proof_id' src = '{$user['proof_id']}' width = '345' height = '300' alt=''>
                                </div>
                            </div>
                        </div>
                        
                        <h6>PROOF COE</h6>
                        <div class = 'proof_coe'>
                            <img width = '345' src = '{$user['proof_coe']}' height = '300' id = 'proof_coe' alt=''>
                        </div>
                
                ";
            }

            $tableContent = implode("\n", $tableDisplay);

        ?>

        
        <?php echo $tableContent; ?>
                </div>
            </div>
            <div id="popupForm" class="popup-details">
                <form action="">
                    
                    <img id = "closeImage" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">

                    <div class = "firstRow">
                        <p id = "personalDetail">PERSONAL DETAILS</p>
                        
                        <div class ="fullNameDisplay">
                            <div class = "firstName">
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
                            <input type="text" id = "companyAddressProfile" name = "company_name">
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
                        </div>
                        
                        

                        <?php 
                        
                            foreach ($allUsers as $user) {
                                $picDIsplay[] = " 

                                <div class = 'proofBillIdContainer'>
                                    <div class = 'billContainer'>
                                        <h6>PROOF BILL</h6>
                                        <div class = 'proof_bill'>
                                            <img width = '345' height = '300' id = 'proof_bill' src = '{$user['proof_bill']}' alt=''>
                                        </div>
                                    </div>
                                    <div class = 'idContainer'>
                                        <h6>PROOF ID</h6>
                                        <div class = 'proof_id'>
                                            <img id = 'proof_idProfile' width = '345' src = '{$user['proof_id']}' height = '300' alt=''>
                                        </div>
                                    </div>
                                </div>
                                
                                    <h6>PROOF COE</h6>
                                    <div class = 'proof_coe'>
                                        <img width = '345' height = '300' id = 'proof_coe' src = '{$user['proof_coe']}' alt=''>
                                    </div>
                                ";
                            }

                             $display = implode("\n", $picDIsplay);

                        ?>

                        <?php echo $display; ?>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        editProfileBtn.addEventListener("click", function(){
            popupForm.style.display = "block";
        });

        closeImage.addEventListener("click", function(){
            popupForm.style.display = "none";
        });

        editProfileBtn.addEventListener("click", function(){
            
            let fname_display = document.getElementById("firstName").textContent;
            let lastName = document.getElementById("lastName").textContent;
            let gender = document.getElementById("gender").textContent;
            let birthday = document.getElementById("birthday").textContent;
            let age = document.getElementById("age").textContent;
            let email = document.getElementById("email").textContent;
            let bankName = document.getElementById("bankName").textContent;
            let bankNumber = document.getElementById("bankNumber").textContent;
            let holderName = document.getElementById("holderName").textContent;
            let tinId = document.getElementById("tinId").textContent;
            let companyName = document.getElementById("companyName").textContent;
            let companyAddress = document.getElementById("companyAddress").textContent;
            let companyNumer = document.getElementById("companyNumer").textContent;
            let position = document.getElementById("position").textContent;
            let earning = document.getElementById("earning").textContent;
            let proof_bill = document.getElementById("earning").src;
            let proof_id = document.getElementById("proof_idSrc").value;
            let proof_coe = document.getElementById("proof_coe").src;
            
            // Inputs
            let fnameInput = document.getElementById("fnameInputProfile");
            let lnameInput = document.getElementById("lnameInputProfile");
            let genderInput = document.getElementById("genderInputProfile");
            let birthdayInput = document.getElementById("birthdateInputProfile");
            let ageInput = document.getElementById("ageInput");
            let emailInput = document.getElementById("emailInputProfile");
            let bankNameInput = document.getElementById("banknameInputProfile");
            let bankNumberInput = document.getElementById("banknumberInputProfile");
            let holderNameInput = document.getElementById("holdernameInputProfile");
            let tinIdInput = document.getElementById("tinidInputProfile");
            let companyNameInput = document.getElementById("companyInputProfile");
            let companyAddressInput = document.getElementById("companyAddressProfile");
            let companyNumerInput = document.getElementById("companyNumberProfile");
            let positionInput = document.getElementById("positionProfile");
            let earningInput = document.getElementById("earningProfile");
            let proof_billImg = document.getElementById("proof_bill");
            let proof_idImg = document.getElementById("proof_idProfile");
            let proof_coeImg = document.getElementById("proof_coe");

            fnameInput.value = fname_display;
            lnameInput.value = lastName;
            genderInput.value = gender;
            birthdayInput.value = birthday;
            ageInput.value = age;
            emailInput.value = email;
            bankNameInput.value = bankName;
            bankNumberInput.value = bankNumber;
            holderNameInput.value = holderName;
            tinIdInput.value = tinId;
            companyNameInput.value = companyName;
            companyAddressInput.value = companyAddress;
            companyNumerInput.value = companyNumer;
            positionInput.value = position;
            earningInput.value = earning;
            proof_billImg.src = proofBill;
            proof_idImg.src = proof_id;
            proof_coeImg.src = proofCoe;
            form.style.display = "block";

        });


    </script>
</body>
</html>