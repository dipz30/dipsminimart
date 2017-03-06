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
  
   /* session_start();
    if(!isset($_SESSION["user"])){
			header("location:login.php");
		} else if(isset($_POST['log'])){
				session_destroy();
				header('location:login.php?logout=success');
			}else{
				
			}*/
?>
<html>
    <title>Sales Report</title>
	<head>
	<link href="stylesheets/layout1.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="style.css">
	
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
    </head>
    <body>
        <div class="bodywrap">
            <div class="topbar">
                <div id="head1"><form action="" method="post"></form><!--<a name="log" style="text-decoration: none;"><pre id="logtext" align="left" style="margin-left: 5px;"><strong>Logout</strong></pre></a>--></div>
                <div id="head3" style="width: 440px; ">				
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr border="0" cellpadding="0" cellspacing="0" width="100%">
							<form action="salesreport.php" method="get" ecntype="multipart/data-form">
								<td><input type="text"placeholder="From Eg.Year-Month-Day" name="d1" style=" margin-left: 10px; margin-top: 5px; width: 90%; height:28px; font-style: italic; text-align: center;"></td>
								<td><input type="text"placeholder="To Eg.Year-Month-Day" name="d2"  style="margin-top: 5px; width: 90%; height: 28px; font-style: italic; text-align: center;"></td>
								<td><input type="submit" id="searchbtn" name="searchbtn" value="Search" style="margin-right: -8px; margin-left:-19px;  margin-top: 5px; width: 60px; height: 28px;"></td>
							</form>
						</tr>
					</table>
					
				</div>	
            </div>
            <div class="leftbar">
                <ul class="sub-menu2">
				
					<li><a href="main.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Home</button></a></li><br>
                    <li><a href="sales.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Sales</button></a></li><br>
                    <li><a href="products.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-cloud"></span>&nbsp;Products</button></a></li><br>
                    <li><a href="customer.php"><button type="button" id = "customerb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-user"></span>&nbsp;Customers</button></a></li><br>
                    <li><a href="supplier.php"><button type="button"id = "supplierb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-road"></span>&nbsp;Supplier</button></a></li><br>
                    <li><a href="salesreport.php"><button type="button"id = "salesreportb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-list-alt"></span>&nbsp;Sales Report</button></a></li><br>
					<li><form action ="" method="post"><button type="submit" id = "productsb" class="btn btn-warning btn-lg" name = "log"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</button></form></li>
                </ul>
            </div>
            <div class="centerbar" id="centerbar">
				<div class="productinfo">
					<tbody>
						<tr align="center">
						<td colspan="7">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="40px" style="color:#033;">

						<tr>
						 <th colspan="7" align="center" height="20px" style="border-bottom:1px solid #033; background: #033; color:#FFF;">&nbsp;&nbsp;&nbsp;&nbsp;Summary Sales</th>
						</tr>
						
						</table>
						<div class="Scroll" style="height: 100%;">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="px" style="color:#033;">
						
						  <tr height="30px">
								<th style="border-bottom:1px solid #333;"> Date </th>
								<th style="border-bottom:1px solid #333;"> Customers </th>
								<th style="border-bottom:1px solid #333;"> Product Sold </th>
								<th style="border-bottom:1px solid #333;"> Quantity Sold </th>
								<th style="border-bottom:1px solid #333;"> Amount Paid </th>
								<th style="border-bottom:1px solid #333;"> Profit </th>
						  </tr>
							<!-- Search goes here! -->
							<!-- Search end here -->
							<?php
							   require('connect.php');
							   
							   if(isset($_GET['searchbtn'])){
										   $d1 = $_GET['d1'];
										   $d2 = $_GET['d2'];
										   
							   $query="SELECT * FROM sales WHERE Date BETWEEN '$d1' and '$d2'";
							   $result=mysqli_query($db_link, $query);
							   while ($row=mysqli_fetch_array($result)){?>
									 
									 <tr align="center" style="height:35px">
									   <td style="border-bottom:1px solid #333;"> <?php echo $row['Date']; ?> </td>
									   <td style="border-bottom:1px solid #333;"> <?php echo $row['Customer']; ?> </td>
									   <td style="border-bottom:1px solid #333;"> <?php echo $row['Name']; ?> </td>
									   <td style="border-bottom:1px solid #333;"> <?php echo $row['Quantity']; ?> </td>
									   <td style="border-bottom:1px solid #333;">Php <?php echo $row['Total']; ?> </td>
									   <td style="border-bottom:1px solid #333;"> <?php echo $row['Profit']; ?> </td>
									 </tr>
								  <?php
							   }}?>
						</table>
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom-color: #030; border-right-color: #030; border-bottom-style: solid; border-right-style: solid; border-bottom-width: 1px;">
								<tr>
								  <td width="17%">&nbsp;</td>
								  <td width="17%">&nbsp;</td>
								  <td width="39%">&nbsp;</td>
								  <td width="11%" style="text-align: center;  border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px; border-left-color: #030; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px; height:35px;">Sales</td>
								  <td width="10%" style="text-align: center;  border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px ; height:35px;">Profit</td>
								</tr>
								<tr>
									<td style=" text-align: center; border-bottom-color: #030; border-bottom-style: none; border-bottom-width: 1px; border-right-width: 1px; border-top-width: 1px; ">Total Obtained:</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td style="text-align: center;  border-left-color: #030; height:35px; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px;">
								  
										<?php
											if(isset($_GET['searchbtn'])){
											  $d1 = $_GET['d1'];
											  $d2 = $_GET['d2'];
												  $view1 = "SELECT sum(total) FROM sales WHERE Date BETWEEN '$d1' and '$d2'";
												  $results=mysqli_query($db_link, $view1);
												  for($i=0; $rows = mysqli_fetch_array($results); $i++){
												  $total=$rows['sum(total)'];
												  echo "Php"." ".$total;
													  }
												  }
										?>
									</td>
								
									<td height = "35px" style="text-align: center;" >
										<?php
											  if(isset($_GET['searchbtn'])){
													$d1 = $_GET['d1'];
													$d2 = $_GET['d2'];
													$view2 = "SELECT sum(profit) FROM sales WHERE Date BETWEEN '$d1' and '$d2'";
													$results1=mysqli_query($db_link, $view2);
													for($i=0; $rowss = mysqli_fetch_array($results1); $i++){
													$profit=$rowss['sum(profit)'];
													echo "Php"." ".$profit;
													  }
												  }
										  ?>
									</td>
								</tr>
							  </table>
							  <p>&nbsp;</p></td>
							</tr>
						  </table>
						</div>
						</td>
						</tr>
					</tbody>
				</div>
			</div>
            <div class="buttombar"><pre style="margin-top: 40px; text-align: center;"> &copy; 2016 All Rights Reserved.  |  Designed By:<a href="https://www.facebook.com/jadejastine.diputado">Jade Jastine Diputado</a></pre></div>
        </div>
    </body>
</html>