<?php

    class Register{

        public $db;

        public function __construct(){
            $this->db = new Database();
        }   

        public function addUser($data, $file){

            $accountType = $_POST["accountType"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $address = $_POST["Address"];
            $gender = $_POST["gender"];
            $birthday = $_POST["birthday"];
            $age = $_POST["age"];
            $email = $_POST["email"];
            $bankName = $_POST["bankName"];
            $bankAccNum = $_POST["bankAccNum"];
            $holderName = $_POST["holderName"];
            $tinNum = $_POST["tinNum"];
            $comName = $_POST["comName"];
            $comAddress = $_POST["comAddress"];
            $comNum = $_POST["comNum"];
            $position = $_POST["position"];
            $earning = $_POST["earning"];
            $proofBill = $file["proofBill"]["name"];
            $bill_temp = $file["proofBill"]["tmp_name"];
            $proofId = $file["proofId"]["name"];
            $id_temp = $file["proofId"]["tmp_name"];
            $proofCoe = $file["proofCoe"]["name"];
            $coe_temp = $file["proofCoe"]["tmp_name"];
            $password = $_POST["password"];
            $status = "Pending";
            
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

            $upload_dir = "../../model/upload/";

            $div = explode('.', $proofBill);
            $file_ext = strtolower(end($div));
            $bill_image = substr(md5(time()),0, 10).'.'.$file_ext;
            $upload_bill = $upload_dir . $proofBill;

            echo $upload_bill;
            
            $div1 = explode('.', $proofId);
            $file_ext = strtolower(end($div1));
            $id_image = substr(md5(time()),0, 10).'.'.$file_ext;
            $upload_ID = $upload_dir . $proofId;

             echo $upload_ID;

            $div2 = explode('.', $proofCoe);
            $file_ext = strtolower(end($div2));
            $coe_image = substr(md5(time()),0, 10).'.'.$file_ext;
            $upload_Coe = $upload_dir . $proofCoe;

            echo $upload_Coe;

            $cpassword = $_POST["cpassword"];
            $role = "User";
            $is_blocked = "0";
            $is_valid = "0";

            move_uploaded_file($bill_temp, $upload_dir . $proofBill);
            move_uploaded_file($id_temp, $upload_dir . $proofId);
            move_uploaded_file($coe_temp, $upload_dir . $proofCoe);
            $sql = "INSERT INTO user_tbl (fname, lname, gender,birthday, age, email, bank_name, bank_number, holder_name, tin_num, com_name, com_address, com_num, position, earning, proof_bill, proof_id, proof_coe, password, role, account_type, is_blocked, is_valid, status, max_loan, max_months) VALUES ('$fname', '$lname', '$gender', '$birthday', '$age', '$email', '$bankName', '$bankAccNum', '$holderName', '$tinNum', '$comName', '$comAddress', '$comNum',  '$position', '$earning', '$upload_bill', '$upload_ID', '$upload_Coe', '$hashedpassword', '$role', '$accountType', '$is_blocked', '$is_valid', '$status', '10000', '12')";

            $result = $this->db->insert($sql);

        }

        public function updateUser($data, $file){
            
            $id = $_SESSION["user_id"];
            $fname = $_POST["f_name"];
            $lname = $_POST["l_name"];
            $gender = $_POST["gender"];
            $birthday = $_POST["birthday"];
            $age = $_POST["age"];
            $email = $_POST["email"];
            $bankName = $_POST["bank_name"];
            $bankAccNum = $_POST["bank_number"];
            $holderName = $_POST["holder_name"];
            $tinNum = $_POST["tin_id"];
            $comName = $_POST["company_name"];
            $comAddress = $_POST["company_address"];
            $comNum = $_POST["company_number"];
            $position = $_POST["position"];
            $earning = $_POST["earning"];

            $sql = "UPDATE user_tbl SET fname = '$fname', lname = '$lname', gender = '$gender', birthday = '$birthday', age = '$age', email = '$email', bank_name = '$bankName', bank_number = '$bankAccNum', holder_name = '$holderName', tin_num = '$tinNum', com_name = '$comName', com_address = '$comAddress', com_num = '$comNum', position = '$position', earning = '$earning' WHERE id = '$id'";

            $result = $this->db->update($sql);
        }

        public function updateUserFromAdmin($data, $file){
            
            $id = $_POST["user_id"];
            $fname = $_POST["f_name"];
            $lname = $_POST["l_name"];
            $gender = $_POST["gender"];
            $birthday = $_POST["birthday"];
            $age = $_POST["age"];
            $email = $_POST["email"];
            $bankName = $_POST["bank_name"];
            $bankAccNum = $_POST["bank_number"];
            $holderName = $_POST["holder_name"];
            $tinNum = $_POST["tin_id"];
            $comName = $_POST["company_name"];
            $comAddress = $_POST["company_address"];
            $comNum = $_POST["company_number"];
            $position = $_POST["position"];
            $earning = $_POST["earning"];
            $account_type = $_POST["accountSelect"];

            $sql = "UPDATE user_tbl SET account_type = '$account_type', fname = '$fname', lname = '$lname', gender = '$gender', birthday = '$birthday', age = '$age', email = '$email', bank_name = '$bankName', bank_number = '$bankAccNum', holder_name = '$holderName', tin_num = '$tinNum', com_name = '$comName', com_address = '$comAddress', com_num = '$comNum', position = '$position', earning = '$earning' WHERE id = '$id'";

            $result = $this->db->update($sql);
        }
        
        
        public function getUsers() {

            $sql = "SELECT * FROM user_tbl ORDER BY id DESC";
            
            
            $result = $this->db->retrieve($sql);

            $usersData = [];
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $usersData[] = [
                        'id' => $row["id"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birthday' => $row["birthday"],
                        'age' => $row["age"],
                        'email' => $row["email"],
                        'bank_name' => $row["bank_name"],
                        'bank_number' => $row["bank_number"],
                        'holder_name' => $row["holder_name"],
                        'tin_num' => $row["tin_num"],
                        'com_name' => $row["com_name"],
                        'com_address' => $row["com_address"],
                        'com_num' => $row["com_num"],
                        'position' => $row["position"],
                        'earning' => $row["earning"],
                        'proof_bill' => $row["proof_bill"],
                        'proof_id' => $row["proof_id"],
                        'proof_coe' => $row["proof_coe"],
                        'account_type' => $row["account_type"],
                        'is_blocked' => $row["is_blocked"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $usersData = "";
            }

            return $usersData;
        }

        public function getSpecificUser() {

            $id = $_SESSION["user_id"];

            $sql = "SELECT * FROM user_tbl WHERE id = '$id' ";
            
            
            $result = $this->db->retrieve($sql);

            $usersData = [];
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $usersData[] = [
                        'id' => $row["id"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birthday' => $row["birthday"],
                        'age' => $row["age"],
                        'email' => $row["email"],
                        'bank_name' => $row["bank_name"],
                        'bank_number' => $row["bank_number"],
                        'holder_name' => $row["holder_name"],
                        'tin_num' => $row["tin_num"],
                        'com_name' => $row["com_name"],
                        'com_address' => $row["com_address"],
                        'com_num' => $row["com_num"],
                        'position' => $row["position"],
                        'earning' => $row["earning"],
                        'proof_bill' => $row["proof_bill"],
                        'proof_id' => $row["proof_id"],
                        'proof_coe' => $row["proof_coe"],
                        'account_type' => $row["account_type"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $usersData = "No user found";
            }

            return $usersData;
        }

        public function getLoans(){
            $sql = "SELECT CONCAT(user_tbl.fname, ' ', user_tbl.lname) as fullname, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalPayment = $row["interest"] + $row["loan_money"];
                    $loanData[] = [
                        'fullname' => $row["fullname"],
                        'loan_money' => $row["loan_money"],
                        'loan_date' => $row["loan_date"],
                        'total_payment' => $totalPayment,
                        'deadline' => $row["deadline"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $loanData = "";
            }

            return $loanData;
        }

        public function getLoansSpecific(){
            $id = $_SESSION["user_id"];
            $sql = "SELECT CONCAT(user_tbl.fname, ' ', user_tbl.lname) as fullname, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.status as status, loan_tbl.note as note FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE user_tbl.id = '$id' ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalPayment = $row["interest"] + $row["loan_money"];
                    $loanData[] = [
                        'fullname' => $row["fullname"],
                        'loan_money' => $row["loan_money"],
                        'loan_date' => $row["loan_date"],
                        'total_payment' => $totalPayment,
                        'deadline' => $row["deadline"],
                        'status' => $row["status"],
                        'note' => $row["note"]
                    ];
                }
            }else{
                $loanData = "";
            }

            return $loanData;
        }

        public function getNotif(){
            $sql = "SELECT transaction_table.t_id as trans_id, transaction_table.t_type as type, transaction_table.status as status, loan_tbl.loan_money as money, transaction_table.total_payment as total_monthly, transaction_table.due_date as monthly_deadline, loan_tbl.with_interest as interest, loan_tbl.deadline as deadline, CONCAT(user_tbl.fname, ' ', user_tbl.lname) as full_name FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY transaction_table.t_id DESC";

            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalPayment = $row["money"] - $row["interest"];
                    $notifications[] = [
                        'trans_id' => $row["trans_id"],
                        'type' => $row["type"],
                        'status' => $row["status"],
                        'money' => $row["money"],
                        'monthly' => $row["total_monthly"],
                        'monthly_deadline' => $row["monthly_deadline"],
                        'total_payment' => $totalPayment,
                        'interest' => $row["interest"],
                        'full_name' => $row["full_name"],
                        'deadline' => $row["deadline"]
                    ];
                }
            }else{
                $notifications = "";
            }

            return $notifications;
        }

        public function getSpecificNotif(){
            $id = $_SESSION["user_id"];
            $sql = "SELECT transaction_table.t_id as trans_id, transaction_table.t_type as type, transaction_table.status as status, loan_tbl.loan_money as money, transaction_table.total_payment as total_monthly, transaction_table.due_date as monthly_deadline, loan_tbl.with_interest as interest, loan_tbl.deadline as deadline, CONCAT(user_tbl.fname, ' ', user_tbl.lname) as full_name FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE user_tbl.id = '$id' ORDER BY transaction_table.t_id DESC";

            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalPayment = $row["money"] - $row["interest"];
                    $notifications[] = [
                        'trans_id' => $row["trans_id"],
                        'type' => $row["type"],
                        'status' => $row["status"],
                        'money' => $row["money"],
                        'monthly' => $row["total_monthly"],
                        'monthly_deadline' => $row["monthly_deadline"],
                        'total_payment' => $totalPayment,
                        'interest' => $row["interest"],
                        'full_name' => $row["full_name"],
                        'deadline' => $row["deadline"]
                    ];
                }
            }else{
                $notifications = "";
            }

            return $notifications;
        }

        public function getNotifSpecific(){
            $id = $_SESSION["user_id"];
            $sql = "SELECT transaction_table.t_id as trans_id, transaction_table.t_type as type, transaction_table.status as status, loan_tbl.loan_money as money, transaction_table.total_payment as total_monthly, transaction_table.due_date as monthly_deadline, loan_tbl.with_interest as interest, loan_tbl.deadline as deadline, CONCAT(user_tbl.fname, ' ', user_tbl.lname) as full_name FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE user_tbl.id = '$id' ORDER BY transaction_table.t_id DESC";

            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalPayment = $row["money"] - $row["interest"];
                    $notifications[] = [
                        'trans_id' => $row["trans_id"],
                        'type' => $row["type"],
                        'status' => $row["status"],
                        'money' => $row["money"],
                        'monthly' => $row["total_monthly"],
                        'monthly_deadline' => $row["monthly_deadline"],
                        'total_payment' => $totalPayment,
                        'interest' => $row["interest"],
                        'full_name' => $row["full_name"],
                        'deadline' => $row["deadline"]
                    ];
                }
            }else{
                $notifications = "";
            }

            return $notifications;
        }

        public function getSpecificBills($specific_id){
            $sql = "SELECT transaction_table.t_id as trans_id, transaction_table.t_type as type, transaction_table.status as status, loan_tbl.loan_money as money, loan_tbl.total_payment as total_payment_loan, transaction_table.total_payment as total_monthly, transaction_table.due_date as monthly_deadline, loan_tbl.with_interest as interest, loan_tbl.deadline as deadline, transaction_table.loan_id as loan_id, CONCAT(user_tbl.fname, ' ', user_tbl.lname) as full_name, transaction_table.penalty as penalty, transaction_table.date as date FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE loan_tbl.loan_id = '$specific_id'";

            $result = $this->db->retrieve($sql);

            $currentDate = date("Y-m-d");

            if($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalPayment = $row["money"] - $row["interest"];
                    $total_money = $row["total_monthly"];
                    $notifications[] = [
                        'trans_id' => $row["trans_id"],
                        'type' => $row["type"],
                        'status' => $row["status"],
                        'money' => $row["money"],
                        'monthly' => $row["total_monthly"],
                        'monthly_deadline' => $row["monthly_deadline"],
                        'total_payment' => $totalPayment,
                        'interest' => $row["interest"],
                        'full_name' => $row["full_name"],
                        'penalty' => $row["penalty"],
                        'loan_id' => $row["loan_id"],
                        'total_payment_loan' => $row["total_payment_loan"],
                        'deadline' => $row["deadline"]
                    ];
                }
            }else{
                $notifications = "";
            }

            return $notifications;
        }

        public function getUsersWithWhere($tableName,$columnName, $userId){
            
            $sql = "SELECT * FROM $tableName WHERE $columnName =  '$userId'";
            $result = $this->db->retrieve($sql);
            
            return $result;
        }

        public function updateStatusReject($data){

            $status = $_POST["status_rejected"];
            $id = $_POST["userId"];

            $currentDate = new DateTime();

            $currentDate->modify('+1 month');

            $formattedDate = $currentDate->format('Y-m-d');

            $sql = "UPDATE user_tbl SET status = '$status', issue_days = '$formattedDate' WHERE id = '$id'";
            $result = $this->db->insert($sql);
        }

        public function updateStatus($data){

            $status = $_POST["status"];
            $id = $_POST["userId"];

            $currentDate = new DateTime();

            $currentDate->modify('+1 month');

            $formattedDate = $currentDate->format('Y-m-d');

            $sql = "UPDATE user_tbl SET status = '$status', issue_days = '$formattedDate' WHERE id = '$id'";
            $result = $this->db->insert($sql);
        }

        public function updateStatusBlock($data, $id){

            $status = $_POST["status_blocked"];


            $sql = "UPDATE user_tbl SET is_blocked = '$status' WHERE id = '$id'";
            $result = $this->db->insert($sql);
        }

        public function addDaysToCurrentDate($daysToAdd) {
            $currentDate = new DateTime();
            $futureDate = clone $currentDate;

            $futureDate->modify("+$daysToAdd days");

            return $futureDate;
        }
        
        public function addLoan($data) {
            $id = $_SESSION["user_id"];
            $num_months = $_POST["month_select"];
            $total_months = intval($num_months) * 28;

            $error = false;
            $money = $_POST["numberOfAmount"];
            
            $id = $_SESSION["user_id"];
            $currentDate = date("Y-m-d");

            $sqlGetLoan = "SELECT * FROM user_tbl WHERE id = '$id'";

            $resulGetLoan = $this->db->retrieve($sqlGetLoan);

            if ($resulGetLoan) {
                if ($row = mysqli_fetch_assoc($resulGetLoan)) {
                    $max_loan = $row["max_loan"];
                }
            }

            if($total_loans >= $max_loan){
                $error = false;
                $_SESSION["loan_error_message"] = "You can only loan $max_loan at once";
            }

            $_SESSION["loan_error_message"] = "";
            function isValidWholeThousand($number) {
                // Define the regex pattern for a whole thousand
                $pattern = '/^[1-9][0-9]*000$/';
                // Check if the number matches the pattern
                return preg_match($pattern, $number);
            }

            if(isValidWholeThousand($money)){
                $error = false;
                $_SESSION["loan_error_message"] = "";
            }else{
                $error = true;
                $_SESSION["loan_error_message"] = "Your money must be a whole thousand";
            }

            if($money < 5000 || $money > $max_loan){
                $error = true;
                $_SESSION["loan_error_message"] = "Your money must be greater than 5000 or equal 10000";
            }

            $sqlUser = "SELECT * FROM user_tbl WHERE id = '$id '";

            $resultUser = $this->db->retrieve($sqlUser);


            if ($resultUser) {
                if ($row = mysqli_fetch_assoc($resultUser)) {
                   $total_loan = $row["total_loan"];
                }
            }

            if($total_loan >= $max_loan){
                $_SESSION["loan_error_message"] = "Your have reached the maximum amount to loan";
                $error = true;
            }

            if($error === false){
                $percentage = "0.03";
                $floatValue = floatval($percentage);
                $totalAmount = intval($money);
                $totalInterest = $totalAmount * $floatValue;
                $sql = "INSERT INTO loan_tbl (loan_money, with_interest, loan_date, deadline_days, user_id, status, max_loan, loan_status) VALUES ('$totalAmount', '$totalInterest', '$currentDate', '$total_months', '$id', 'Pending', 'Not Paid')";
                
                $result = $this->db->insert($sql);
                
            }
        }

        public function minusDays(){
            $sql = "UPDATE loan_tbl SET deadline_days = deadline_days - 1 WHERE deadline_days > 0";

            $result = $this->db->update($updateSsqltatus);
        }

        public function savings($data, $type){

            
            $status = "Pending";
            $currentDate = date("Y-m-d");
            $user_id = $_SESSION["user_id"];
            $trans_type = $type;
            $user_id = $_SESSION["user_id"];

            if($type === "Deposit"){
                $amount = $_POST["amount_dep"];
                $error = false;

                $sql = "SELECT id, total_savings FROM user_tbl WHERE id = '$user_id'";

                $result = $this->db->retrieve($sql);
                
                if ($result) {
                    if ($row = mysqli_fetch_assoc($result)) {
                        $total_savings = $row["total_savings"];
                    }
                }

                if($amount < 100 || $amount > 1000 ){
                    $error = true;
                    $_SESSION["message"] = "Your deposit must be greater than 100 or less than 1000)";
                }

                if($total_savings >= 100000){
                    $error = true;
                    $_SESSION["message"] = "Youve reached the maximum savings(100k)";
                }

                if($error === false){
                    $sqlDep = "INSERT INTO savings_tbl (s_type, s_amount, s_status, s_date, user_id) VALUES ('$trans_type', '$amount', '$status', '$currentDate', '$user_id')";

                    $resultDep = $this->db->insert($sqlDep);
                }
                
            }else if($type === "Withdraw"){
                $amount = $_POST["withdraw_amount"];
                $error = false;

                $sql = "SELECT savings_tbl.s_id as s_id, savings_tbl.s_amount as s_amount, savings_tbl.s_date as s_date, savings_tbl.s_withdraw_attempt as s_withdraw_attempt, user_tbl.total_savings as total_savings FROM savings_tbl INNER JOIN user_tbl ON savings_tbl.user_id = user_tbl.id WHERE user_id = '$user_id' ORDER BY s_id DESC";

                $result = $this->db->retrieve($sql);
                
                if ($result) {
                    if ($row = mysqli_fetch_assoc($result)) {
                        $total_withdraw = $row["s_withdraw_attempt"];
                        $amount_remain = $row["total_savings"];
                        $last_withdraw = $row["s_date"];
                    }
                }


                if($last_withdraw !==  $currentDate){
                    $total_withdraw = 0;
                }

                if($amount < 500){
                    $error = true;
                    $_SESSION["message"] = "Your amount must be greater than or equal 500";
                }

                if($amount > $amount_remain){
                    $error = true;
                    $_SESSION["message"] = "You dont have enough balance";
                }
                
                if($total_withdraw > 4){
                    $error = true;
                    $_SESSION["message"] = "You have reached the maximum(5) withdraw";
                }

                if($error === false){
                    $total_withdrawal = $total_withdraw + 1;
                    $sql = "INSERT INTO savings_tbl (s_type, s_amount, s_withdraw_attempt, s_status, s_date, user_id) VALUES ('$trans_type', '$amount', '$total_withdrawal', '$status', '$currentDate', '$user_id')";

                    $result = $this->db->insert($sql);
                }
            }

            
        }

        public function updateSavings($data, $type){

            $total_amount = $_POST["deposit_amount"];
            $user_id = $_SESSION["user_id"];
            $s_id = $_POST["id_display"];

            $sql = "SELECT id, total_savings FROM user_tbl WHERE id = '$user_id' ORDER BY id DESC";

            $result = $this->db->retrieve($sql);

            $total_savings = 0;

             if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $total_savings= $row["total_savings"];
                }
            }


            if($type === "Deposit"){

                $total_saving_dep = $total_amount + $total_savings;

                $sqlDep = "UPDATE savings_tbl SET s_total_savings = '$total_saving_dep', s_status = 'Approved' WHERE s_id = '$s_id'";
                
                $sqlUser = "UPDATE user_tbl SET total_savings = '$total_saving_dep' WHERE id = '$user_id'";
                
            }else if($type === "Withdraw"){

                $total_saving_dep =  $total_savings - $total_amount;

                $sqlDep= "UPDATE savings_tbl SET s_total_savings = '$total_saving_dep', s_status = 'Approved' WHERE s_id = '$s_id'";

                $sqlUser = "UPDATE user_tbl SET total_savings = '$total_saving_dep' WHERE id = '$user_id'";
            }

           
            $results= $this->db->update($sqlDep);
            $resultUser= $this->db->update($sqlUser);

        }

        public function getBillings(){
            $sql = "SELECT savings_tbl.s_id as s_id, savings_tbl.s_type as s_type, savings_tbl.s_total_savings as total_amount, savings_tbl.s_amount as s_amount, savings_tbl.s_status as s_status, savings_tbl.s_date as s_date, savings_tbl.user_id as user_id, user_tbl.bank_name as bank_name, user_tbl.bank_number as bank_number, user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.holder_name as holder_name FROM savings_tbl INNER JOIN user_tbl ON savings_tbl.user_id = user_tbl.id ORDER BY s_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row["fname"] . " " . $row["lname"];
                    $savings[] = [
                        'full_name' => $fullname,
                        'user_id' => $row["user_id"],
                        's_id' => $row["s_id"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        's_type' => $row["s_type"],
                        's_amount' => $row["s_amount"],
                        'holder_name' => $row["holder_name"],
                        's_status' => $row["s_status"],
                        's_date' => $row["s_date"],
                        'bank_name' => $row["bank_name"],
                        'bank_number' => $row["bank_number"]
                    ];
                }
            }else{
                $savings = "";
            }

            return $savings;
        }

        public function getSavings(){
            
            $user_id = $_SESSION["user_id"];
            $sql = "SELECT savings_tbl.s_id as s_id, savings_tbl.s_type as s_type, savings_tbl.s_total_savings as s_amount, savings_tbl.s_status as s_status, savings_tbl.s_date as s_date, user_tbl.bank_name as bank_name, user_tbl.bank_number as bank_number, user_tbl.total_savings as savings, CONCAT(user_tbl.fname, ' ' , user_tbl.lname) as full_name FROM savings_tbl INNER JOIN user_tbl ON savings_tbl.user_id = user_tbl.id WHERE user_tbl.id = '$user_id' ORDER BY s_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $savings[] = [
                        's_id' => $row["s_id"],
                        'full_name' => $row["full_name"],
                        'savings' => $row["savings"],
                        's_type' => $row["s_type"],
                        's_amount' => $row["s_amount"],
                        's_status' => $row["s_status"],
                        's_date' => $row["s_date"],
                        'bank_name' => $row["bank_name"],
                        'bank_number' => $row["bank_number"]
                    ];
                }
            }else{
                $savings = "";
            }

            return $savings;
        }

        public function getTotalIncome(){
            
            $sql = "SELECT SUM(total_payment) as total_income FROM transaction_table WHERE status = 'Overdue' OR status = 'Completed'";
            $result = $this->db->retrieve($sql);

            if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $savings[] = [
                        'total_income' => $row["total_income"]
                    ];
                }
            }else{
                $savings = "";
            }

            return $savings;
        }

        public function getAllSavings(){
            $sql = "SELECT savings_tbl.s_id as s_id, savings_tbl.s_type as s_type, savings_tbl.s_amount as s_amount, savings_tbl.s_status as s_status, savings_tbl.s_date as s_date, user_tbl.bank_name as bank_name, user_tbl.bank_number as bank_number, user_tbl.total_savings as savings, CONCAT(user_tbl.fname, ' ' , user_tbl.lname) as full_name FROM savings_tbl INNER JOIN user_tbl ON savings_tbl.user_id = user_tbl.id ORDER BY s_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $savings[] = [
                        's_id' => $row["s_id"],
                        'full_name' => $row["full_name"],
                        'savings' => $row["savings"],
                        's_type' => $row["s_type"],
                        's_amount' => $row["s_amount"],
                        's_status' => $row["s_status"],
                        's_date' => $row["s_date"],
                        'bank_name' => $row["bank_name"],
                        'bank_number' => $row["bank_number"]
                    ];
                }
            }else{
                $savings = "No Savings Found";
            }

            return $savings;
        }

        public function rejectLoan(){
            $rejectNote = $_POST["reason"];
            $loan_id = $_POST["loan_id"];

            $sql =  $sql = "UPDATE loan_tbl SET status = 'Rejected', note = '$rejectNote' WHERE loan_id = '45'";
            
            $result = $this->db->insert($sql);

        }

        public function transaction($data, $type){
            $id = $_SESSION["user_id"];

            $deadline_days = $_POST["date_deadline"];
            
            $addDaysToCurrentDate = function ($daysToAdd) {
                $currentDate = new DateTime();
                $futureDate = clone $currentDate;
                $futureDate->modify("+$daysToAdd days");
                return $futureDate;
            };

            $total_months = $deadline_days / 28;

            $type_trans = $type;
            $loan_id = $_POST["id_display"];
            $status = "Not Paid";
            $currentDate = date("Y-m-d");

            $interest = $_POST["interest"];
            $total_interest = intval($interest);

            $total_money = $_POST["loanAmount"];
            $totalAmount = intval($total_money);

            $total_payment = $totalAmount + $total_interest;

            $over_all_total = $total_payment - $total_interest;
            $loops = 0;
            
            while($loops < $deadline_days){
                $new_days = $loops + 28;
                $payment = $total_money / $total_months;
                $futureDateObject = $addDaysToCurrentDate($new_days);
                $deadline = $futureDateObject->format('Y-m-d');

                $sql = "INSERT INTO transaction_table (t_type, loan_id, status, total_payment, due_date, date) VALUES ('$type_trans', '$loan_id', '$status', '$payment', '$deadline', '$currentDate')";
            
                $result = $this->db->insert($sql);

                $loops = $new_days;
            }

            $updateUser = "UPDATE user_tbl SET total_loan = '$total_money' WHERE id = '$id'";

            $resultLoan = $this->db->update($updateUser);


            $updateStatus = "UPDATE loan_tbl SET status = 'Accepted', deadline = '$deadline', total_payment = '$over_all_total' WHERE loan_id = '$loan_id'";

            $resultStatus = $this->db->update($updateStatus);
        }

        public function getListLoan(){
            $sql = "SELECT user_tbl.id as user_id, user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birthday, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_number as bank_number, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, loan_tbl.loan_id as loan_id, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.deadline_days as deadline_days, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row["fname"] . " " . $row["lname"];
                    $loanlist[] = [
                        'full_name' => $fullname,
                        'user_id' => $row["user_id"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birthday' => $row["birthday"],
                        'age' => $row["age"],
                        'email' => $row["email"],
                        'bank_number' => $row["bank_number"],
                        'bank_name' => $row["bank_name"],
                        'holder' => $row["holder"],
                        'loan_id' => $row["loan_id"],
                        'loan_money' => $row["loan_money"],
                        'interest' => $row["interest"],
                        'loan_date' => $row["loan_date"],
                        'deadline' => $row["deadline_days"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $loanlist = "";
            }

            return $loanlist;
        }

        public function getAcceptedLoan(){
            $currentMonth = date('m');
            $sql = "SELECT user_tbl.id as user_id, user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birthday, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_number as bank_number, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, user_tbl.account_type as account_type, loan_tbl.loan_id as loan_id, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.deadline_days as deadline_days, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE loan_tbl.status = 'Accepted' AND MONTH(loan_tbl.loan_date) = '$currentMonth' ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row["fname"] . " " . $row["lname"];
                    $loanlist[] = [
                        'full_name' => $fullname,
                        'user_id' => $row["user_id"],
                        'account_type' => $row["account_type"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birthday' => $row["birthday"],
                        'age' => $row["age"],
                        'email' => $row["email"],
                        'bank_number' => $row["bank_number"],
                        'bank_name' => $row["bank_name"],
                        'holder' => $row["holder"],
                        'loan_id' => $row["loan_id"],
                        'loan_money' => $row["loan_money"],
                        'interest' => $row["interest"],
                        'loan_date' => $row["loan_date"],
                        'deadline' => $row["deadline_days"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $loanlist = "";
            }

            return $loanlist;
        }

        public function getAcceptedLoanFilter($month, $year){
            $currentMonth = date('m');
            $sql = "SELECT user_tbl.id as user_id, user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birthday, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_number as bank_number, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, user_tbl.account_type as account_type, loan_tbl.loan_id as loan_id, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.deadline_days as deadline_days, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE loan_tbl.status = 'Accepted' AND MONTH(loan_tbl.loan_date) = '$month' AND YEAR(loan_tbl.loan_date) = '$year' ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row["fname"] . " " . $row["lname"];
                    $loanlist[] = [
                        'full_name' => $fullname,
                        'user_id' => $row["user_id"],
                        'account_type' => $row["account_type"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birthday' => $row["birthday"],
                        'age' => $row["age"],
                        'email' => $row["email"],
                        'bank_number' => $row["bank_number"],
                        'bank_name' => $row["bank_name"],
                        'holder' => $row["holder"],
                        'loan_id' => $row["loan_id"],
                        'loan_money' => $row["loan_money"],
                        'interest' => $row["interest"],
                        'loan_date' => $row["loan_date"],
                        'deadline' => $row["deadline_days"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $loanlist = "";
            }

            return $loanlist;
        }

        public function getAcceptedLoanFilterMonth($month){
            $currentYear = date('Y');
            $sql = "SELECT user_tbl.id as user_id, user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birthday, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_number as bank_number, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, user_tbl.account_type as account_type, loan_tbl.loan_id as loan_id, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.deadline_days as deadline_days, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE loan_tbl.status = 'Accepted' AND MONTH(loan_tbl.loan_date) = '$month' AND YEAR(loan_tbl.loan_date) = '$currentYear' ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row["fname"] . " " . $row["lname"];
                    $loanlist[] = [
                        'full_name' => $fullname,
                        'user_id' => $row["user_id"],
                        'account_type' => $row["account_type"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birthday' => $row["birthday"],
                        'age' => $row["age"],
                        'email' => $row["email"],
                        'bank_number' => $row["bank_number"],
                        'bank_name' => $row["bank_name"],
                        'holder' => $row["holder"],
                        'loan_id' => $row["loan_id"],
                        'loan_money' => $row["loan_money"],
                        'interest' => $row["interest"],
                        'loan_date' => $row["loan_date"],
                        'deadline' => $row["deadline_days"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $loanlist = "";
            }

            return $loanlist;
        }

        public function getAcceptedLoanFilterYear($year){
            $currentMonth = date('m');
            $sql = "SELECT user_tbl.id as user_id, user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birthday, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_number as bank_number, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, user_tbl.account_type as account_type, loan_tbl.loan_id as loan_id, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.deadline_days as deadline_days, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE YEAR(loan_tbl.loan_date) = '$year' AND MONTH(loan_tbl.loan_date) = '$currentMonth' AND loan_tbl.status = 'Accepted' ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row["fname"] . " " . $row["lname"];
                    $loanlist[] = [
                        'full_name' => $fullname,
                        'user_id' => $row["user_id"],
                        'account_type' => $row["account_type"],
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birthday' => $row["birthday"],
                        'age' => $row["age"],
                        'email' => $row["email"],
                        'bank_number' => $row["bank_number"],
                        'bank_name' => $row["bank_name"],
                        'holder' => $row["holder"],
                        'loan_id' => $row["loan_id"],
                        'loan_money' => $row["loan_money"],
                        'interest' => $row["interest"],
                        'loan_date' => $row["loan_date"],
                        'deadline' => $row["deadline_days"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $loanlist = "";
            }

            return $loanlist;
        }

        public function getTransaction(){
            $sql = "SELECT user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birth, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, loan_tbl.loan_money as money, loan_tbl.deadline as deadline, loan_tbl.with_interest as interest, loan_tbl.total_payment as total_payment, loan_tbl.loan_id as loan_id, transaction_table.t_type as type, transaction_table.date as date, transaction_table.status as status FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY transaction_table.t_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname  = $row["fname"] . " " . $row["lname"];
                    $transaction[] = [

                        'fullname' => $fullname,
                        'fname' => $row["fname"],
                        'lname' => $row["lname"],
                        'gender' => $row["gender"],
                        'birth' => $row["birth"],
                        'age' =>  $row["age"],
                        'bank_name' => $row["bank_name"],
                        'total_payment' => $row["total_payment"],
                        'money' => $row["money"],
                        'deadline' => $row["deadline"],
                        'interest' => $row["interest"],
                        'loan_id' => $row["loan_id"],
                        'type' => $row["type"],
                        'date' => $row["date"],
                        'status' => $row["status"]
                    ];
                }
            }else{
                $transaction = "";
            }
            
            return $transaction;
        }

        public function getSideBar(){

            $type = $_SESSION["account_type"];
            $role = $_SESSION["role"];
            if($role === "User"){
                if($type === "Basic"){
                    $link = "basic";
                }else if($type === "Premium"){
                    $link = "premium";
                }
            }else{
                $link = "premium";
            }

            return $link;
        }

        public function getDeadline(){
            $sql = "SELECT loan_tbl.user_id as user_id, loan_tbl.deadline as deadline, transaction_table.status as status FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id  WHERE transaction_table.status = 'Not Paid'";

            $result = $this->db->retrieve($sql);

            $currentDate = date("Y-m-d");
            $deadline = "";
            $id = "";
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $deadline = $row["deadline"];
                    $id = $row["user_id"];
                }
            }



            if($currentDate > $deadline){
                $user_status = "Disabled";

                $sql = "UPDATE user_tbl SET status = '$user_status' WHERE id = '$id'";

                $result = $this->db->update($sql);
            }

            return $deadline;
        }

        public function praktisCron(){
            $sql = "INSERT INTO praktis (name, age) VALUES ('Jeremy', '12')";
            
            $result = $this->db->insert($sql);
        }

        public function getMonthOption(){
            $id = $_SESSION["user_id"];
            $sql = "SELECT * FROM user_tbl WHERE id = '$id'";
            $result = $this->db->retrieve($sql);

            if (!isset($_SESSION['my_array'])) {
                // Initialize the session array if it doesn't exist
                $_SESSION['my_array'] = [];
            }

            if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $total_months = $row["max_months"];
                }
            }

            // while ($total_months > 0) {
            //     $number -= 3;
            //     $result = ($number <= 0) ? 1 : $number;
            //     $_SESSION['my_array'][] = $result;
            // }   

            return $_SESSION['my_array'];
        }

        public function getPenalty(){
            $sql = "SELECT transaction_table.t_id as t_id, transaction_table.total_payment as total_payment, transaction_table.due_date as due_date, loan_tbl.total_payment as total_payment_loan, loan_tbl.loan_id as loan_id, transaction_table.status as status FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id WHERE transaction_table.status = 'Not Paid' OR transaction_table.status = 'Overdue'";
            $result = $this->db->retrieve($sql);
            $currentDateNow = date("Y-m-d");
            $currentDate = new DateTime($currentDateNow);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $t_id = $row["t_id"];
                    $payment = $row["total_payment"];
                    $due_date = $row["due_date"];
                    $loan_id = $row["loan_id"];
                    $total_payment_loan = $row["total_payment_loan"];

                    $sqlCount = "SELECT SUM(penalty) as penalties FROM transaction_table WHERE loan_id = '$loan_id'";
                    $resultCount = $this->db->retrieve($sqlCount);
                    if ($resultCount && $rowCount = $resultCount->fetch_assoc()) {
                        $penalties = $rowCount["penalties"];
                    } else {
                        $penalties = 0;
                    }
                    $dueDateTime = new DateTime($due_date);
                    if ($currentDate > $dueDateTime) {
                        $total_penalty = 0.02 * $payment;
                        $total_payment = $total_penalty + $payment;
                        $updateSql = "UPDATE transaction_table SET penalty = '$total_penalty', total_payment = '$total_payment' WHERE t_id = '$t_id'";
                        $this->db->update($updateSql);

                        $new_total_payment = $total_payment_loan + $penalties;
                        $updateSqlLoan = "UPDATE loan_tbl SET total_payment = '$new_total_payment' WHERE loan_id = '$loan_id'";
                        $this->db->update($updateSqlLoan);
                    }
                }
            }
        }

        public function updateBillingStatus($data){
            $status_bills = $_POST["status"];
            $t_id = $_POST["t_id"];
            $sql = "UPDATE transaction_table SET status = '$status_bills' WHERE t_id = '$t_id'";

            $result = $this->db->insert($sql);

            $sqlUsers = "SELECT transaction_table.loan_id as loan_id, transaction_table.t_id as t_id, user_tbl.id as user_id, user_tbl.total_loan as total_loan, transaction_table.total_payment as payment, transaction_table.status as status, user_tbl.max_loan as max_loan, user_tbl.max_months as max_months FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id WHERE t_id = '$t_id'";

            $resultusers = $this->db->retrieve($sqlUsers);

            if ($resultusers) {
                if ($row = mysqli_fetch_assoc($resultusers)) {
                    $user_id = $row["user_id"];
                    $total_loan = $row["total_loan"];
                    $payment = $row["payment"];
                    $status = $row["status"];
                    $max_loan = $row["max_loan"];
                    $max_months = $row["max_months"];
                }
            }

            if($status_bills === "Completed"){
                $new_max_loan = $max_loan + 5000;
                $new_max_months = $max_months + 3;
            }else{
                $new_max_loan = $max_loan;
                $new_max_months = $max_months;
            }

            if($new_max_loan >= 50000){
                $new_max_loan = 50000;
            }

            if($new_max_months >= 32){
                $new_max_months = 32;
            }

            if($status_bills === "Completed" || $status_bills === "Overdue"){
                $over_all = $total_loan - $payment;

                if($over_all < 0){
                    $over_all = 0;
                }

                $sqlUpdateLoan = "UPDATE user_tbl SET total_loan = '$over_all', max_loan = '$new_max_loan', max_months = '$new_max_months' WHERE id = '$user_id'";

                $resultLoan = $this->db->insert($sqlUpdateLoan);
            }
        }

        public function getAccountIssue() {
            $sql = "SELECT * FROM user_tbl WHERE status = 'Rejected'";
            $result = $this->db->retrieve($sql);

            if ($result === false) {
                echo "Error retrieving data: " . $this->db->error;
                return;
            }
            $current_date_now = date("Y-m-d");

            $currentDate = new DateTime($current_date_now);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $due_date = $row["issue_days"];
                    $user_id = $row["id"];
                    $dueDateTime = new DateTime($due_date);

                    if ($currentDate >= $dueDateTime) {
                        $sqlDelete = "DELETE FROM user_tbl WHERE id = ?";
                        $result = $this->db->delete($sqlDelete, [$user_id]);

                        if ($result) {
                            echo "User with ID $user_id deleted successfully.<br>";
                        } else {
                            echo "Failed to delete user with ID $user_id.<br>";
                        }
                    }
                }
            } else {
                echo "No users found in the database.";
            }
        }
        

        public function divideIncome(){
            $sql = "SELECT SUM(total_payment) as total_income FROM transaction_table WHERE status = 'Overdue' OR status = 'Completed'";
            $result = $this->db->retrieve($sql);

            $sqlCountPrem = "SELECT COUNT(account_type) as total_premium FROM user_tbl WHERE account_type = 'Premium'";
            $resultTotalPrem = $this->db->retrieve($sqlCountPrem);

            $start_year = new DateTime("2024-06-03");
            $new_year = clone $start_year;
            $new_year->modify('+1 year');

            if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $total_income = $row["total_income"];
                } else {
                    $total_income = 0; 
                }
            } else {
                $total_income = 0;
            }

            if ($resultTotalPrem) {
                if ($row = mysqli_fetch_assoc($resultTotalPrem)) {
                    $total_all_prem = $row["total_premium"];
                } else {
                    $total_all_prem = 0;
                }
            } else {
                $total_all_prem = 0; 
            }

            $dateToCompare = new DateTime("2025-07-03");

            if ($dateToCompare >= $start_year) {

                $total_divide = ($total_income * 0.02) / $total_all_prem;

                $sqlPrem = "SELECT * FROM user_tbl WHERE account_type = 'Premium'";
                $resultPrem = $this->db->retrieve($sqlPrem);
                if ($resultPrem) {
                    while ($row = mysqli_fetch_assoc($resultPrem)) {
                        $total_savings = $row["total_savings"] + $total_divide;
                        $user_id = $row["id"];

                        if ($total_savings >= 100000) {
                            $total_savings = 100000;
                        }

                        $updateUser = "UPDATE user_tbl SET total_savings = '$total_savings' WHERE id = '$user_id'";
                        $this->db->update($updateUser);
                    }
                }  
            }

            
        }
    }

?>