<?php 

    include_once "../template/sidebarUser.php";
    
    include_once "../../controller/db_connector.php";
    include_once "../../model/user_model.php";

    $getUsers = new Register();

    $allUsers = $getUsers->getSpecificUser();

    $tableDisplay = [];

    

?>

        </div>

        <div class='profile_container'>

        <?php 
        
            foreach ($allUsers as $user) {
                $tableDisplay[] = "

                

                    <h1>Profile</h1>

                    <div class = 'inner_profile'>


                        <div class='btn_container'>
                            <button type='button' class='btn btn-outline-primary'>Edit Profile</button>
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
        </div>
    </div>
</body>
</html>