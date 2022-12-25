<?php 
session_start();
include("conn.php");

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $_SESSION['username'] = $username;

        $sql = "select * from user where password = '$password' and username = '$username' limit 1";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) != 1){
            echo "invalid username and password";
            header("Location: loginsession.php");
        }
        else{
            header("Location: ./biotdashboard.php");
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/svg" href="../websiteimages/Elogo.svg">
    <link rel="stylesheet" href="../cssfiles/cssloginsession.css">

    <!--Icon-->
    <script src="https://kit.fontawesome.com/9779e9cb68.js" crossorigin="anonymous"></script>
    
    <title>BIOT</title>
</head>
<body>
    
    <!--Main contents-->
    <main class="container">

        <div class="divlogin">

            <!--Login title-->
            <div class="logo">
                <img src="../websiteimages/Elogo.svg" alt="Logo">
            </div>

            <!--Form-->
            <form action="#" method="post">

                <!--Username-->
                <input type="text" id="usernameinput" placeholder="Username" name="username" maxlength="50">

                <!--Password-->
                <div class="divpassword">
                    <input type="password" id="passwordinput" name="password" placeholder="Password" maxlength="50" >
                    <i id="togglepassword" class="fa-regular fa-eye"></i>
                </div>
                

                <!--Submit-->
                <button type="submit" id="loginbutton" name="submit" value="Login">Login</button>

                <!--Checkbox-->
                <div class="divcb">
                    <div class="grouped1">
                        <p>Forgot password?</p>
                    </div>
                </div>

            </form>
            
        </div>

    </main>

    
    <script>

    //for password visibility
    const togglePassword = document.querySelector('#togglepassword');
    const password = document.querySelector('#passwordinput');

    togglepassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    </script>
</body>
</html>