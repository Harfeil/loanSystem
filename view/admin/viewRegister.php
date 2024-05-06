<?php 

    // include_once "../../model/user_model.php";
    include_once "../../controller/db_connector.php";

    $db = new Database();
    include_once "../template/sidebar.php";

?>
        <link rel="stylesheet" href="../../model/loan.css">
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
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                    
                        $sql = "SELECT * FROM user_tbl ORDER BY id DESC";
                        $allUsers = $db->retrieve($sql);

                        if($allUsers){
                            while($row = mysqli_fetch_assoc($allUsers)){
                                ?>
                                    <tr data-userId = <?=$row["id"]?> data-fname = <?=$row["fname"]?> data-lname = <?=$row["lname"]?> data-gender = <?=$row["gender"]?> data-birthday = <?=$row["birthday"]?> data-age = <?=$row["age"]?> data-email = <?=$row["email"]?> data-bankName = <?=$row["bank_name"]?> data-bankNumber = <?=$row["bank_number"]?> data-holderName = <?=$row["holder_name"]?> data-tinNum = <?=$row["tin_num"]?> data-comName = <?=$row["com_name"]?> data-comAdd = <?=$row["com_address"]?> data-comNum = <?=$row["com_num"]?> data-position = <?=$row["position"]?> data-earning = <?=$row["earning"]?> data-proofBill = <?=$row["proof_bill"]?> data-proofId = <?=$row["proof_id"]?> data-proofCoe = <?=$row["proof_coe"]?> class = "showDetailsBtn">
                                        <td><?=$row["fname"]?></td>
                                        <td><?=$row["lname"]?></td>
                                        <td><?=$row["age"]?></td>
                                        <td><?=$row["email"]?></td>
                                        <td><?=$row["account_type"]?></td>
                                        <td><?=$row["status"]?></td>
                                    </tr>
                                <?php 
                            }
                        }

                    ?>

                </tbody>
            </table>

            <div id="popupForm" class="popup-details">
            
                <div class = "firstRow">
                    <img id = "closeImage" src="../../model/upload/close.png" alt="" width = "30px" height = "30px">

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

                    <div class = "buttonContainer">
                        <button type="button" class="btn btn-outline-primary">Accept</button>
                        <button type="button" class="btn btn-outline-danger">Decline</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script>
         document.addEventListener('DOMContentLoaded', function(){
            let showBtn =  document.querySelectorAll('.showDetailsBtn');
            showBtn.forEach(function(row) {
                row.addEventListener('click', function() {
                    let form = document.getElementById("popupForm");
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
                    let proofBill = this.getAttribute('data-proofBill');
                    let proofId = this.getAttribute('data-proofId');
                    let proofCoe = this.getAttribute('data-proofCoe');

                    // Inputs
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
         });

         let imgBtn = document.getElementById("closeImage");

         imgBtn.addEventListener("click", function(){
            let form = document.getElementById("popupForm");

            form.style.display = "None";
         });
    </script>
</body>
</html>