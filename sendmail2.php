<?php 
include 'dbcon.php';
include 'index.php';
include 'callapi.php';
include 'home.php';

session_start();

if(isset($_POST['subscribe'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
 
// Recipient 
//$to = 'yogeshkumaras0808@gmail.com'; 
 
// Sender 
$from = 'yogeshkumaras0808@gmail.com'; 
$fromName = 'Yogesh'; 
 
// Email subject 
$subject = 'PHP Email with Attachment by Yogesh';  
 
// Attachment file 
$file = "images/sher.png"; 
 
// Email body content 
$htmlContent = ' 
    <h3>PHP Email with Attachment by Yogesh</h3> 
    <p>This email is sent from the PHP script with attachment.</p> 
    <img src="images/sher.png" alt="">
'; 
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 
// Send email 
//$email_search = "SELECT * FROM registration WHERE email = '$email' AND status='active'";

$email_search = "SELECT email FROM registration";
$query = mysqli_query($con,$email_search);

$row = mysqli_fetch_assoc($query);

while($row){
    $to = array($row['email']);

    $i = 0;
    while($i<100){
       // $result = mail($email,$subject,$message,$headers);
       // sleep(10);
        $i++;
    

    foreach($to as $value){
        $result = mail($value,$subject,$message,$headers);
        sleep(10);
    }}
}
}




/*$mail = @mail($email, $subject, $message, $headers, $returnpath);  
 
// Email sending status 
echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; }*/
 
?>