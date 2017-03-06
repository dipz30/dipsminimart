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
				setcookie("user","",time()-7200);
				header('location:login.php?logout=success');
			}else{
				
			}
	
	/*session_start();
    if(!isset($_SESSION["user"])){
			header("location:login.php");
		} else if(isset($_POST['log'])){
				session_destroy();
				header('location:login.php?logout=success');
			}else{
				
			}*/
?>
<html>
    <head>
    <title>Customer</title>	
    </head>
	 <link href="stylesheets/layout1.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="style.css">
	
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	
			<script>
			function toggle_visibility(id){
				var e = document.getElementById(id);
				if(e.style.display=='block')
					e.style.display = 'none';
				else
					e.style.display = 'block';
				}
			</script>
			
    <body>
        <div class="bodywrap">
            <div class="topbar">
                <div id="head1"></form><!--<a name="log" style="text-decoration: none;"><pre id="logtext" align="left" style="margin-left: 5px;"><strong>Logout</strong></pre></a>--></div>
               
               <div id="head3"><form action="result_customer.php" method="get" ecntype="multipart/data-form"><input type="text" id="searchbar" name="searchbox" placeholder="Search Customer" style="width: 78%; height: 70%; font-style: italic; text-align: center;"><input type="submit" id="searchbtn" name="searchbtn" value="Search" style="width: 20%; height: 71%;"></form></div>
            </div>
            <div class="leftbar">
                <ul class="sub-menu2">
					
					<li><a href="main.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Home</button></a></li><br>
                    <li><a href="sales.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Sales</button></a></li><br>
                    <li><a href="products.php"><button type="button" id = "productsb" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-cloud"></span>&nbsp;Products</button></a></li><br>
                    <li><a href="customer.php"><button type="button" id = "customerb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-user"></span>&nbsp;Customers</button></a></li><br>
                    <li><a href="supplier.php"><button type="button"id = "supplierb" class="btn btn-success btn-lg"><span class = "glyphicon glyphicon-road"></span>&nbsp;Supplier</button></a></li><br>
                   
					<li><form action ="" method="post"><button type="submit" id = "productsb" class="btn btn-warning btn-lg" name = "log"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</button></form></li>
                </ul>
            </div>
            <div class="centerbar" id="centerbar">
				<div class="addsection">
					<form>
						 <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')">
							<input type="button" id="btnadd" value="+ Add Customer" style="width: 14%; height: 95%; margin-top: 3px; margin-left: 86%;" />
						 </a>
					</form>
				</div>
				<div class="productinfo">
					<tbody>
						<tr align="center">
						<td colspan="7">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="40px" style="color:#033; margin-top: 4px;">

						<tr>
						 <th colspan="7" align="center" height="20px" style="border-bottom:1px solid #033; background: #5a7155; color:#FFF;">&nbsp;&nbsp;&nbsp;&nbsp;Customer Information</th>
						</tr>
						
						</table>
						<div class="Scroll">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="0px" style="color:#033;">
						
						  <tr style="height:30px;">
							<th style="border-bottom:1px solid #333;"> Name </th>
							<th style="border-bottom:1px solid #333;"> Contact </th>
							<th style="border-bottom:1px solid #333;"> Address </th>
							<th style="border-bottom:1px solid #333;"> Note </th>
							<th style="border-bottom:1px solid #333;"> Action </th>
						  </tr>
							<!-- Search goes here! -->
							<!-- Search end here -->
								<?php
						   require('connect.php');
							$query="SELECT * FROM customers";
							$result=mysqli_query($db_link, $query);?>
								<?php while ($row=mysqli_fetch_array($result)){?>
	
							<tr align="center" style="height:30px;">
								<td style="border-bottom:1px solid #333;"> <?php echo $row['Name']; ?> </td>
								<td style="border-bottom:1px solid #333;"> <?php echo $row['Contact']; ?> </td>
								<td style="border-bottom:1px solid #333;"> <?php echo $row['Address']; ?> </td>
								<td style="border-bottom:1px solid #333;"> <?php echo $row['Note']; ?> </td>
								<td style="border-bottom:1px solid #333;">
								<a href="delete_customer.php?id=<?php echo md5($row['ID']);?>"><input type="button" value="Delete" style="width:50; height:25px; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
								</td>
							</tr>
							<?php
						 }?>
						</table>
						</div>
						</td>
						</tr>
					</tbody>
				</div>
			</div>
            <div class="buttombar"> <pre style="margin-top: 40px; text-align: center;"> &copy; 2016 All Rights Reserved.  |  Designed By:<a href="https://www.facebook.com/jadejastine.diputado">Jade Jastine Diputado</a></pre></div>
        </div>
		
		<!--Pop Menu-->
		<div id="popup-box1" class="popup-position">
				<div id="popup-wrapper">
					<div id="popup-container">
						<div id="popup-head-color1">
							<p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF">Close</font></a></p>
							<p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Customer </p>
						</div>
						<br>
						<form action="add_customer.php" method="POST">
							<table border="0" align="center">	
						<tr>
							<td align="right">Name:</td>
							<td><input type="text" id="txtbox" name="name" placeholder="Customer name" required><br>
							</td>
						</tr>
							
						<tr>
							<td align="right">Contact:</td>
							<td><input type="text" id="txtbox" name="contact" placeholder="Contact" required><br>
							</td>
						</tr>
							
						<tr>
							<td align="right">Address:</td>
							<td><input type="text" id="txtbox" name="address" placeholder="Address" required><br>
							</td>
						</tr>
							
						<tr>
							<td align="right">Note:</td>
							<td><input type="text" id="txtbox" name="note" placeholder="Note" required><br>
							</td>
						</tr>
							
							<br>
						<tr  align="left">
							<td>&nbsp;  </td>
							<td><input type="submit" style="width: 40%; height: 130%; margin-top: 10px; background:#00ae00; " id="btnnav" name="sub" value="ADD"></a></td>
						</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
    </body>
</html>