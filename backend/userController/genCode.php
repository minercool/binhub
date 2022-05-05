<?php
require_once '../config.php';
if(isset($_POST['email'])){
$email = $_POST['email'];
$query = $conn->prepare("SELECT * FROM users WHERE email LIKE '$email'");
$query->execute();
$result = $query->fetch();
if($result){
    $_SESSION['id'] = $result['id'];
    $_SESSION['code'] = rand(1000,9999);
    $to = $email;
    $subject = "Reset password";
    $message = '
    <html>
    <body>
    <h1>Hello <font color="red">'.$result['username'].'</font></h1>
    <p><h3>We are sorry to know that your having trouble logging into your account, your confirmation code is <font color="red">'.$_SESSION['code'].'</font> please confirm your code and after you will be redirected to a reset password page  <font color="red"></font></h3></p> if the displayed information are wrong feel free to reply and we will contact you</body></html>';
    $headers = "From:BinHub <binhub@support.de>\r\n";
    $headers .= "Reply-To: BinHub@support.de\r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($to,$subject,$message,$headers);
    header('Location: ../../frontend/insert-code.php');

    
}else{
    
    $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400" role="alert">
       Unknown email.
      </div><br>';
  
   header('Location: ../../frontend/forgot-password.php');
}
}



?>
