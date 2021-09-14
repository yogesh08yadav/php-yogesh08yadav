<?php 
 
 include ('dbcon.php');
 include('index.php');
 include('callapi.php');

 session_start();

 if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    



    $from = 'yogeshkumaras0808@gmail.com'; 
    $fromName = 'CodexWorld'; 
 
 
   $subject = 'PHP Email with Attachment by CodexWorld';  
 
   /*$filename = "saturn_hexagon.png";
   $path = "https://imgs.xkcd.com/comics";
   $content = $path . "/" . $filename;
   $file = file_get_contents($content);
   $file = chunk_split(base64_encode($file)); */
   $file = "images/sher.png"
 
  
    //$htmlContent = ' 
    //<h3>PHP Email with Attachment by CodexWorld</h3> 
   // <p>This email is sent from the PHP script with attachment.</p> '; 
 

    $headers = "From: $fromName"." <".$from.">"; 
  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 

    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 

   $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
   "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 

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
 

  $mail = @mail($email, $subject, $message, $headers, $returnpath);  
    
  echo $mail?$file:"<h1>Email sending failed.</h1>"; }
 
?>