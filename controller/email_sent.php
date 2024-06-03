<?php

    if(isset($_POST["submit_email"])){

        $url = "https://script.google.com/macros/s/AKfycbzvMplve10h_c2IKgmXsB9cAAYDyI0d9mlTAb1wb6grmcPII5Sng-3udoguJc4IPhxr/exec";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $_POST['email_display'],
                "subject"   => "Loan System",
                "body"      => $_POST['message_email']
            ])
        ]);
        $result = curl_exec($ch);
        echo $result;

        header("Location: ../view/admin/viewRegister.php");
    }

?>