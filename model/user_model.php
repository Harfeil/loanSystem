<?php


    require_once "../controller/db_connector.php";

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

        public function getUsers($tableName){

            $sql = "SELECT * FROM $tableName ORDER BY id DESC";
            $result = $this->db->retrieve($sql);
            return $result;

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
            // Define addDaysToCurrentDate function as an anonymous function
            $addDaysToCurrentDate = function ($daysToAdd) {
                $currentDate = new DateTime();
                $futureDate = clone $currentDate;
                $futureDate->modify("+$daysToAdd days");
                return $futureDate;
            };

            $money = $_POST["numberOfAmount"];
            $totalAmount = intval($money);
            $id = $_SESSION["user_id"];
            $percentage = "0.03";
            $floatValue = floatval($percentage);
            $totalInterest = $totalAmount * $floatValue;
            $currentDate = date("Y-m-d");

            // Use the addDaysToCurrentDate function directly
            $futureDateObject = $addDaysToCurrentDate(28);
            $deadline = $futureDateObject->format('Y-m-d');

            $sql = "INSERT INTO loan_tbl (loan_money, with_interest, loan_date, deadline, user_id, status) VALUES ('$totalAmount', '$totalInterest', '$currentDate', '$deadline', '$id', 'Pending')";
            
            $result = $this->db->insert($sql);
        }

        

        public function transaction($data, $type){
            
            $type_trans = $type;
            $loan_id = $_POST["id_display"];
            $status = "Not Paid";
            $currentDate = date("Y-m-d");

            $sql = "INSERT INTO transaction_table (t_type, loan_id, status) VALUES ('$type_trans', '$loan_id', '$status')";
            
            $result = $this->db->update($sql);

        }


    }

?>