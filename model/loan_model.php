<?php 

    require_once "../controller/db_connector.php";

    // session_start();

    class Loan{

        public $db;

        public function __construct(){
            $this->db = new Database();
        }

        function addDaysToCurrentDate($daysToAdd) {
            $currentDate = new DateTime();
            $futureDate = clone $currentDate;

            $futureDate->modify("+$daysToAdd days");

            return $futureDate;
        }
        
        public function addLoan($data){

            $money = $data;
            $id = 681;
            $percentage = 0.03;
            $totalInterest = $money * $percentage;
            $currentDate = date("Y-m-d");

            $futureDateObject = addDaysToCurrentDate(28);
            $deadline = $futureDateObject->format('d/m/Y');

            $sql = "INSERT INTO loan_tbl (loan_money, with_interest, loan_date, deadline, user_id) VALUES ('$money', '$totalInterest', '$currentDate', '$deadline', '$id')";
            
            
            $result = $this->db->insert($sql);
        }
    }

?>