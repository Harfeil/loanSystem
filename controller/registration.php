<?php

session_start();

include_once "../model/user_model.php";
include_once "db_connector.php";

$db = new Database();

$register = new Register();

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST["addBtn"])) {

        $sql = "SELECT COUNT(*) AS numRegistrations FROM user_tbl";
        $result = $db->retrieve($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $numOfRegistration = $row["numRegistrations"];

            if ($numOfRegistration >= 100) {

                $errorMessage = "Max limit has been reached";
                $_SESSION["error"] = $errorMessage;
                header("Location: ../view/register.php");
                exit(); // Terminate script execution after redirect
            } else {

                $sqlAccType = "SELECT account_type FROM user_tbl";
                $resultAccType = $db->retrieve($sqlAccType);

                $basicAcc = 0;
                $premAcc = 0;

                if ($resultAccType->num_rows > 0) {

                    while ($rowAccType = $resultAccType->fetch_assoc()) {
                        if ($rowAccType["account_type"] === "Basic") {
                            $basicAcc++;
                        }

                        if ($rowAccType["account_type"] === "Premium") {
                            $premAcc++;
                        }
                    }

                }
                echo $basicAcc;

                if ($premAcc === 50 && $_POST["accountType"] === "Premium") {
                    $errorMessage = "Premium Account has reached the limit";
                    $_SESSION["error"] = $errorMessage;
                    // header("Location: ../view/register.php");
                    exit(); 
                }{
                    $errorMessage = "Registered Successfully";
                    $_SESSION["error"] = $errorMessage;
                    $registerUser = $register->addUser($_POST, $_FILES);
                    // header("Location: ../view/register.php");
                    exit();
                }

                echo $errorMessage;

            }
        }
    }

    if(isset($_POST['status'])){
        $id = $_POST["userId"];

        $registerUser = $register->updateStatus($_POST, $id);
    }

    if(isset($_POST['submitAmount'])){

        $registerUser = $register->addLoan($_POST);
    }
}
?>