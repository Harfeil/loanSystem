<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            background: #ee9ca7; /* fallback for old browsers */
            background: -webkit-linear-gradient(
                to right,
                #ffdde1,
                #ee9ca7
            ); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(
                to right,
                #ffdde1,
                #ee9ca7
            ); 
        }
                
        .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 400px;
        padding-left: 20px;
        padding-right: 40px;
        border-radius: 20px;
        position: relative;
        background-color: #1a1a1a;
        color: #fff;
        border: 1px solid #333;
        margin: 0 auto;
        margin-top: 200px;
        }

        .title {
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 30px;
        color: #00bfff;
        }

        .title::before {
        width: 18px;
        height: 18px;
        }

        .title::after {
        width: 18px;
        height: 18px;
        animation: pulse 1s linear infinite;
        }

        .title::before,
        .title::after {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        border-radius: 50%;
        left: 0px;
        background-color: #00bfff;
        }

        .message,
        .signin {
        font-size: 14.5px;
        color: rgba(255, 255, 255, 0.7);
        }

        .signin {
        text-align: center;
        }

        .signin a:hover {
        text-decoration: underline royalblue;
        }

        .signin a {
        color: #00bfff;
        }

        .flex {
        display: flex;
        width: 100%;
        gap: 6px;
        }

        .form label {
        position: relative;
        }

        .form label .input {
        background-color: #333;
        color: #fff;
        width: 100%;
        padding: 20px 05px 05px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
        }

        .form label .input + span {
        color: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 10px;
        top: 0px;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
        }

        .form label .input:placeholder-shown + span {
        top: 12.5px;
        font-size: 0.9em;
        }

        .form label .input:focus + span,
        .form label .input:valid + span {
        color: #00bfff;
        top: 0px;
        font-size: 0.7em;
        font-weight: 600;
        }

        .input {
        font-size: medium;
        }

        .submit {
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        transform: 0.3s ease;
        background-color: #00bfff;
        }

        .submit:hover {
        background-color: #00bfff96;
        }

        @keyframes pulse {
        from {
            transform: scale(0.9);
            opacity: 1;
        }

        to {
            transform: scale(1.8);
            opacity: 0;
        }
        }

    </style>
</head>
<body>
    <form action = "../controller/retrieve.php" class="form" method = "POST">
    <p class="title">Login Your Account </p>
    <p class="message">Login Your Account. </p>
            
    <label>
        <input class="input" type="email" placeholder="" required="" name = "email">
        <span>Email</span>
    </label> 
        
    <label>
        <input class="input" type="password" placeholder="" required="" name = "password">
        <span>Password</span>
    </label>
    <button class="submit" name = "submitLoginBtn">Submit</button>
    <p class="signin">Dont have account ? <a href="register.php">Register</a> </p>
</form>
    
</body>
</html>