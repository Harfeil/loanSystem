<?php 

    session_start();

    include_once "db_connector.php";

    $db = new Database();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(isset($_POST["submitLoginBtn"])){
                $email = $_POST["email"];
                $password = $_POST["password"];

                $sql = "SELECT * FROM user_tbl WHERE email = '$email'";
                $result = $db->retrieve($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $hashedpassword = $row["password"];
                    $id = $row["id"];
                    if(password_verify($password, $row["password"])) {
                        
                        if($row["role"] === "Admin"){
                            header("Location: ../view/admin/dashboard.php");
                        }else{
                            header("Location: ../view/users/dashboard.php");
                        }

                        $_SESSION["user_id"] = $row["id"];
                        
                    }else {
                        header("Location: ../view/login.php");
                        $messageError = "Incorrect Password";
                    }
                }
            }

        }


    }

?>