<?php
    
	include 'function.php';
	
	if(!loggedin()){
		header("Location: login.php");
		exit();
	}
	
  /*  if(!isset($_SESSION["user"])){
			header("location:login.php");
		} else*/
		if(isset($_POST['log'])){
				session_destroy();
				unset($_COOKIE['user']);
				//setcookie("user","",time()-7200);
				header('location:login.php?logout=success');
			}else{
				
			}
?>
<html>
    <head>
    <title>Main</title>
    <link href="stylesheets/layout1.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="style.css">
	<script src = "//maps.googleapis.com/api/js?key=AIzaSyAR_uaZOtMcPXqajnlk4FsElR2SUL0dDn4" async = "" defer="defer" type="text/javascript"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>		
    </head>
    <body>
        <div class="bodywrap">
            <div class="topbar">
                <div id="head1"><form action="" method="post"></form>
				<div id="head"2><img src="pics/logo.jpg" alt="Mountain View" style="width:1000px;height:80px;padding-bottom:15px;"></div>
				<!--<a name="log" style="text-decoration: none;"><pre id="logtext" align="left" style="margin-left: 5px;"><strong>Logout</strong></pre></a>--></div>
                <!-- <div id="head2"><pre id="pretxt"><strong>Mini Mart</strong></pre></a></div> -->
                <div id="head3"></div>
            </div>
            <div class="leftbar">
               <ul class="sub-menu2">
					<!--<li><form action="" method="post"><button type="submit" class="btn btn-default" name="log">Logout</button></form></li>-->
					<li><a href="main.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</button></a></li><br>
                    <li><a href="sales.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Sales</button></a></li><br>
                    <li><a href="products.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-cloud"></span>&nbsp;Products</button></a></li><br>
                    <li><a href="customer.php"><button type="button" id = "customerb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-user"></span>&nbsp;Customers</button></a></li><br>
                    <li><a href="supplier.php"><button type="button"id = "supplierb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-road"></span>&nbsp;Supplier</button></a></li><br>
                    <!--<li><a href="salesreport.php"><button type="button"id = "salesreportb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-list-alt"></span>&nbsp;Sales Report</button></a></li><br>-->
					<li><form action ="" method="post"><button type="submit" id = "productsb" class="btn btn-warning btn-lg" name = "log"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</button></form></li>
                </ul>
            </div>
          
                <div id="slider">
					<div id="mapouter"><div id="gmap_canvas"><iframe width="800" height="500" frameborder="0" scrolling="no" marginheight="0" src="https://maps.google.com/maps?q=Artiaga Street, Davao City, Davao Region, Philippines, &t=&z=17&ie=UTF8&iwloc=&output=embed" marginwidth="0"></iframe><a href="http://www.embedgooglemap.net">embedgooglemap.net</a></div><style>#gmap_canvas{height:500px;width:800px;}#mapouter{overflow:hidden;height:500px;width:800px;}</style></div>
				</div>
          
            <div class="buttombar"><pre style="margin-top: 40px; text-align: center;"> &copy; 2016 All Rights Reserved.  |  Designed By:<a href="https://www.facebook.com/jadejastine.diputado">Jade Jastine Diputado</a></pre></div>
        </div>
    </body>
</html>