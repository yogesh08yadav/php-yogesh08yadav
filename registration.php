<?php
 include ('dbcon.php');
 include('index.php');
 include('callapi.php');

 session_start();

 if (isset($_POST['submit-btn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

 }


    

    $pass = password_hash($password, PASSWORD_BCRYPT);  
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);  

    $token = bin2hex(random_bytes(15));

    $emailquery = "SELECT * FROM registration WHERE email = '$email'";
    $query = mysqli_query($con,$emailquery);
    

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        echo "Email already exists";
    }
    else{
        if($password === $cpassword){

            $insertquery = "INSERT INTO registration(username, email, mobile, password, cpassword, token, status) VALUES('$username','$email','$mobile','$pass','$cpass','$token','inactive')";

            $iquery = mysqli_query($con,$insertquery);

            if($iquery){
                $subject = "Email activation";
                $body = "Hi, $username. Click here to activate your account https://localhost/2emailVerification/activate.php?token=$token";
                $header = "From : yogeshkumaras0808@gmail.com";
               

            

                if(mail($email,$subject,$body,$header)){
                    $_SESSION['msg'] = "Check your mail to activate your account $email";
                    header('location:login.php');
                }else{
                    echo "Email not sent";
                }
            }else{
                ?>
                <script>
                    alert("Not Inserted");
                </script>
                <?php
            }

        }
        else{
            ?>
            <script>
                alert("Password not matching");
            </script>
            <?php
        }
    }
    

    

 
    




?>