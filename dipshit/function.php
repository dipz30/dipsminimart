
<?php
session_start();
    include ('connect.php');
    mysqli_select_db($db_link,"users");
    //login check function
    function loggedin(){
        if(isset($_SESSION["user"])|| isset($_COOKIE["user"])){
        $loggedin=true;
        return $loggedin;
    
        }    
    }
?>