<?php
require_once '../config.php';
if(isset($_SESSION['id']) && $_SESSION['id'] != null){
    $code = $_POST['code'];
    if($code == $_SESSION['code']){
        header('Location: ../../frontend/reset-password.php');
    }else{
        header('Location: ../../frontend/insert-code.php');
        $_SESSION['alert'] = '<div class="text-sm font-medium text-purple-600 dark:text-purple-400" role="alert">
       Wrong email or password.
      </div><br>';
    }
}else{
    header('Location: ../../frontend/forgot-password.html');
   
}

?>