<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
session_start();
include('dbcon.php');
include('callapi.php');

/*if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];



    /*$subject = "Thank you loggin in, now you will receive an email in every 5 minutes";
    $body = "Hi, $username. <img>$data</img> ";
    $header = "From : yogeshkumaras0808@gmail.com";
    $file =  $data;



     if(mail($email,$subject,$body,$header)){
       $_SESSION['msg'] = "Check your mail to activate your account $email";
         header('location:login.php');
           }else{
        echo "Email not sent";
              }*/






    /*$email_search = "SELECT * FROM registration WHERE email = '$email' AND status='active'";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode){
            echo "Login successful";
            ?>  <script>
                location.replace("home.html");
            </script> <?php
        }else{
            echo "Password invalid";
        }

    }else{
        echo "Email incorrect";
    }


}*/


?>

<body>
    <h1>Login form</h1>
    <p>
        <?php echo $_SESSION['msg'];  ?>
    </p>
    <form action="home.php" class="login-form" method="POST">
        <input type="text" name="email" class="login-form" placeholder="Email">
        <input type="text" name="password" class="login-form" placeholder="Password">
        <button class="login-form" name="login">Get emails</button>
    </form>

</body>

</html>