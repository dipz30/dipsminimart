<?php
    //destroy session
    session_destroy();
    
    //unset cookie
    unset($_COOKIE['user']);
    setcookie("user","",time()-7200);
    header("Location:login.php");
?>