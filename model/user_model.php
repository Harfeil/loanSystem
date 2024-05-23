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
            $sql = "INSERT INTO user_tbl (fname, lname, gender,birthday, age, email, bank_name, bank_number, holder_name, tin_num, com_name, com_address, com_num, position, earning, proof_bill, proof_id, proof_coe, password, role, account_type, is_blocked, is_valid, status) VALUES ('$fname', '$lname', '$gender', '$birthday', '$age', '$email', '$bankName', '$bankAccNum', '$holderName', '$tinNum', '$comName', '$comAddress', '$comNum',  '$position', '$earning', '$upload_bill', '$upload_ID', '$upload_Coe', '$hashedpassword', '$role', '$accountType', '$is_blocked', '$is_valid', '$status')";


            $result = $this->db->insert($sql);

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
                        'status' => $row["status"]
                    ];
                }
            }else{
                $usersData = "No user found";
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
                $loanData = "No Loans Found";
            }

            return $loanData;
        }

        public function getNotif(){
            $sql = "SELECT transaction_table.t_id as trans_id, transaction_table.t_type as type, transaction_table.status as status, loan_tbl.loan_money as money, loan_tbl.with_interest as interest, loan_tbl.deadline as deadline FROM transaction_table INNER JOIN loan_tbl ON transaction_table.loan_id = loan_tbl.loan_id INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY transaction_table.t_id DESC";

            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalPayment = $row["money"] - $row["interest"];
                    $notifications[] = [
                        'trans_id' => $row["trans_id"],
                        'type' => $row["type"],
                        'status' => $row["status"],
                        'money' => $row["money"],
                        'total_payment' => $totalPayment,
                        'interest' => $row["interest"],
                        'deadline' => $row["deadline"]
                    ];
                }
            }else{
                $notifications = "No Loans Found";
            }

            return $notifications;
        }

        public function getUsersWithWhere($tableName,$columnName, $userId){
            
            $sql = "SELECT * FROM $tableName WHERE $columnName =  '$userId'";
            $result = $this->db->retrieve($sql);
            
            return $result;
        }

        public function updateStatus($data){

            $status = $_POST["status"];
            $id = $_POST["userId"];


            $sql = "UPDATE user_tbl SET status = '$status' WHERE id = '$id'";
            $result = $this->db->insert($sql);
        }

        public function addDaysToCurrentDate($daysToAdd) {
            $currentDate = new DateTime();
            $futureDate = clone $currentDate;

            $futureDate->modify("+$daysToAdd days");

            return $futureDate;
        }
        
        public function addLoan($data) {
            $num_months = $_POST["month_select"];
            $total_months = intval($num_months) * 28;

            $money = $_POST["numberOfAmount"];
            $totalAmount = intval($money);
            $id = $_SESSION["user_id"];
            $percentage = "0.03";
            $floatValue = floatval($percentage);
            $totalInterest = $totalAmount * $floatValue;
            $currentDate = date("Y-m-d");


            $sql = "INSERT INTO loan_tbl (loan_money, with_interest, loan_date, deadline_days, user_id, status) VALUES ('$totalAmount', '$totalInterest', '$currentDate', '$total_months', '$id', 'Pending')";
            
            $result = $this->db->insert($sql);
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

                if($total_savings >= 100000){
                    $error = true;
                    $session["message"] = "Youve reached the maximum savings(100k)";
                }

                if($error === false){
                    $sqlDep = "INSERT INTO savings_tbl (s_type, s_amount, s_status, s_date, user_id) VALUES ('$trans_type', '$amount', '$status', '$currentDate', '$user_id')";

                    $resultDep = $this->db->insert($sqlDep);
                }
                
            }else if($type === "Withdraw"){
                $amount = $_POST["withdraw_amount"];
                $error = false;

                $sql = "SELECT s_id, s_amount, s_date, s_withdraw_attempt FROM savings_tbl WHERE user_id = '$user_id' ORDER BY s_id DESC";

                $result = $this->db->retrieve($sql);
                
                if ($result) {
                    if ($row = mysqli_fetch_assoc($result)) {
                        $total_withdraw = $row["s_withdraw_attempt"];
                        $amount_remain = $row["s_amount"];
                        $last_withdraw = $row["s_date"];
                    }
                }


                if($last_withdraw !==  $currentDate){
                    $total_withdraw = 0;
                }

                if($amount < 500){
                    $error = true;
                    $session["message"] = "Your amount must be greater than or equal 500";
                }

                if($amount > $amount_remain){
                    $error = true;
                    $session["message"] = "You dont have enough balance";
                }
                
                if($total_withdraw > 4){
                    $error = true;
                    $session["message"] = "You have reached the maximum(5) withdraw";
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
                $savings = "No Loans Found";
            }

            return $savings;
        }

        public function getSavings(){
            $sql = "SELECT savings_tbl.s_id as s_id, savings_tbl.s_type as s_type, savings_tbl.s_total_savings as s_amount, savings_tbl.s_status as s_status, savings_tbl.s_date as s_date, user_tbl.bank_name as bank_name, user_tbl.bank_number as bank_number, user_tbl.total_savings as savings FROM savings_tbl INNER JOIN user_tbl ON savings_tbl.user_id = user_tbl.id ORDER BY s_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $savings[] = [
                        's_id' => $row["s_id"],
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
                $savings = "No Loans Found";
            }

            return $savings;
        }

        

        public function transaction($data, $type){

            $deadline_days = $_POST["date_deadline"];
            
            $total_months = intval($deadline_days) * 28;
            
            $addDaysToCurrentDate = function ($daysToAdd) {
                $currentDate = new DateTime();
                $futureDate = clone $currentDate;
                $futureDate->modify("+$daysToAdd days");
                return $futureDate;
            };

            $futureDateObject = $addDaysToCurrentDate($total_months);
            $deadline = $futureDateObject->format('Y-m-d');

            $type_trans = $type;
            $loan_id = $_POST["id_display"];
            $status = "Not Paid";
            $currentDate = date("Y-m-d");

            $interest = $_POST["interest"];
            $total_interest = intval($interest);

            $total_money = $_POST["loanAmount"];
            $totalAmount = intval($total_money);

            $total_payment = $totalAmount - $total_interest;

            $sql = "INSERT INTO transaction_table (t_type, loan_id, status, date) VALUES ('$type_trans', '$loan_id', '$status', '$currentDate')";
            
            $result = $this->db->insert($sql);

            $updateStatus = "UPDATE loan_tbl SET status = 'Accepted', deadline = '$deadline', total_payment = '$total_payment' WHERE loan_id = '$loan_id'";

            $resultStatus = $this->db->update($updateStatus);

        }

        public function getListLoan(){
            $sql = "SELECT user_tbl.fname as fname, user_tbl.lname as lname, user_tbl.gender as gender, user_tbl.birthday as birthday, user_tbl.age as age, user_tbl.email as email, user_tbl.bank_number as bank_number, user_tbl.bank_name as bank_name, user_tbl.holder_name as holder, loan_tbl.loan_id as loan_id, loan_tbl.loan_money as loan_money, loan_tbl.with_interest as interest, loan_tbl.loan_date as loan_date, loan_tbl.deadline as deadline, loan_tbl.deadline_days as deadline_days, loan_tbl.status as status FROM loan_tbl INNER JOIN user_tbl ON loan_tbl.user_id = user_tbl.id ORDER BY loan_tbl.loan_id DESC";
            $result = $this->db->retrieve($sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullname = $row["fname"] . " " . $row["lname"];
                    $loanlist[] = [
                        'full_name' => $fullname,
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
                $loanlist = "No Loans Found";
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
                $transaction = "No Transaction Found";
            }
            
            return $transaction;
        }

        public function getSideBar(){

            $type = $_SESSION["account_type"];
            
            if($type === "Basic"){
                $link = "";
            }else if($type === "Premium"){
                $link = "../../view/users/savings.php";
            }

            return $link;

        }


    }

?>