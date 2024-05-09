<?php 

    session_start();

    $errorMessage = "";

    if(isset($_SESSION["error"])){
        $errorMessage = $_SESSION["error"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../model/myloancss.css">
    <title>Document</title>
</head>
<body>

    <form class="form" action = "../controller/registration.php" method = "post" enctype = "multipart/form-data">
        
        <p id = "errorDisplayRegister"><?php echo $errorMessage ?></p>
        <p class="title">Register </p>
        <p class="message">Signup now and get full access to our app. </p>

            <label>
                <label for="">Account Type</label>
                <select name="accountType" id="accountTypeDropdown">
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                </select>
            </label>
            <div class="flex">

            <label>
                <input required="" placeholder="" type="text" class="input" name = "fname">
                <span>Firstname</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name = "lname">
                <span>Lastname</span>
            </label>
        </div>  
        
         <label>
            <input required="" placeholder="" type="text" class="input" name = "Address">
            <span>Address</span>
        </label> 

        <label>
            <label for="">Gender: </label>
            <label for="" >Male</label>
            <input required="" placeholder="" type="radio" name = "gender" value = "Male">
            <label for="">Female</label>
            <input required="" placeholder="" type="radio" name = "gender" value = "Female">
        </label>

        <label>
            <label for="">Birthday</label>
            <input required="" placeholder="" type="date" class = "birthdayInput" name = "birthday">
        </label>

         <label>
            <input required="" placeholder="" type="text" class="input" name = "age">
            <span>Age</span>
        </label>

        <label>
            <input required="" placeholder="" type="email" class="input" name = "email">
            <span>Email</span>
        </label>

        <label for="">Bank Details</label>
            
        <label>
            <input required="" placeholder="" type="text" class="input" name = "bankName">
            <span>Bank Name</span>
        </label>

        <label>
            <input required="" placeholder="" type="text" class="input" name = "bankAccNum">
            <span>Bank Account Number</span>
        </label>

        <label>
            <input required="" placeholder="" type="text" class="input" name = "holderName">
            <span>Card's Holder Name</span>
            <label for="" id = "cardsWarn">Make sure that card holder's name is correct to avoid transaction interruptions</label>
        </label>
        
        <label>
            <input required="" placeholder="" type="text" class="input" name = "tinNum">
            <span>Tin Number</span>
        </label>

        <label for="">Company Working with</label>

            <label>
                <input required="" placeholder="" type="text" class="input" name = "comName">
                <span>Company Name</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name = "comAddress">
                <span>Company Address</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name = "comNum">
                <span>Company Phone Number</span>
                <label for="" id = "comNumWarn">Put a number directed to their HR to confirm employment</label>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name = "position">
                <span>Position</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name = "earning">
                <span>Monthly Earnings</span>
            </label>

            
            <label for="">Upload Proof of Billing</label>
            <input required="" placeholder="" type="file" class="input proofBill" name = "proofBill">
            

            <label for="">Upload Valid ID Primary</label>
            <input required="" placeholder="" type="file" class="input proofId" name = "proofId">

            <label for="">Upload COE(Certificate Of Employment)</label>
            <input required="" placeholder="" type="file" class="input proofCoe" name = "proofCoe">

        <label>
            <input required="" placeholder="" type="password" class="input" name = "password">
            <span>Password</span>
        </label>
        <label>
            <input required="" placeholder="" type="password" class="input" name = "cpassword">
            <span>Confirm password</span>
        </label>
        <button class="submit" name = "addBtn">Submit</button>
        <p class="signin">Already have an acount ? <a href="#">Signin</a> </p>
    </form>

</body>
</html>