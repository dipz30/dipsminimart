<?php
	include 'function.php';
	include('connect.php');
		
		
		if(loggedin()){
			header("Location: main.php");
			exit();
			
		}
		
		if(isset($_POST['sub'])){
			
			//get data
			
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$access = "admin";
			$keep=$_POST['keep'];
			
			if($user&&$pass){
				
					$sql="SELECT * FROM users WHERE Username='".$user."'";
					$result=mysqli_query($db_link, $sql);
					$numrows= mysqli_num_rows($result);
					
					if($numrows==1){
					while($row=mysqli_fetch_assoc($result)){
					$db_pass=$row['Password'];
					$db_access =$row['Access'];
						
						if(md5($pass)==$db_pass && $access==$db_access)
						$loginok = true ;
								
							
							else
								$loginok = false;
							
						if($loginok=true){
							
							if($keep=="on")
							setcookie("user", $user,time()+7200);
	
							else if ($keep=="")
							$_SESSION['user']=$user;
							
							header("Location:main.php");
							exit();
							
						}else
							echo"Incorrect username/password combination.";
						
						
					}
				}
			}
		}
		
		
		
		//if(isset($_POST["sub"])){
		
			/*if(!empty($_POST['user']) && !empty($_POST['pass'])) {
				$user=$_POST['user'];
				$pass=$_POST['pass'];
				$access = "admin";
				$con=mysqli_connect("localhost","root","","mini") or die(mysql_error());
				mysqli_select_db($con,"users");
		
				$sql="SELECT * FROM users WHERE Username='".$user."'";
				$result=mysqli_query($con, $sql);
				$numrows= mysqli_num_rows($result);
				if($numrows==1){
				while($row=mysqli_fetch_assoc($result)){
				$dbusername=$row['Username'];
				$dbpassword=$row['Password'];
				$dbaccess =$row['Access'];
				}
				
				if($user == $dbusername && $pass == $dbpassword && $access == $dbaccess){
				session_start();
				$_SESSION['user']=$user;
		
				/* Redirect browser */
				//header("Location: main.php?");
				//}
				//else {
				//echo "Invalid username or password!";
				//}
		
			//}
		
		//}
		/*else{
			echo "All fields are required!";
			}*/
	//}
	//	if(isset($_GET['Log'])){
				//echo "<font color=r>You are now logged out.</font>";
	//}
?>

<html>
    <head>
    <title>Login</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
    <link href="Stylesheets/layout1.css" rel="stylesheet" type="text/css"/>
    </head>	
    <body class="body1">
      <div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action=" " method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Username" name="user" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="pass" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me" name="keep"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name ="sub">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
    </body>
</html>