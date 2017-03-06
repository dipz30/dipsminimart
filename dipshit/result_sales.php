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
    <title>Result Products</title>
    
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
                <div id="head1"><form action="" method="post"></form><!--<a name="log" style="text-decoration: none;"><pre id="logtext" align="left" style="margin-left: 5px;"><strong>Logout</strong></pre></a>--></div>
                
                <div id="head3"><form action="result_products.php" method="get" ecntype="multipart/data-form"><input type="text" id="searchbar" name="searchbox" placeholder="Search Products" style="width: 78%; height: 70%; font-style: italic; text-align: center;">
				<input type="submit" id="searchbtn" name="searchbtn" value="Search" style="width: 20%; height: 71%;"></form></div>
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
				<div class="productinfo">
					<tbody>
						<tr align="center">
						<td colspan="7">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="40px" style="color:#033;">

						<tr>
						 <th colspan="7" align="center" height="20px" style="background: #5a7155; color:#FFF;">&nbsp;&nbsp;&nbsp;&nbsp;Select Product</th>
						</tr>
						
						</table>
						<div class="Scroll" style="height:100%;">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="0px" style="color:#033;">
						
						  <tr height="30px">
							<th style="border-bottom:1px solid #333;"> Category </th>
							<th style="border-bottom:1px solid #333;"> Name </th>
							<th style="border-bottom:1px solid #333;"> Price </th>
							<th style="border-bottom:1px solid #333;"> Quantity Left </th>
							<th style="border-bottom:1px solid #333;"> Supplier </th>
							<th style="border-bottom:1px solid #333;"> Pick Order </th>
						  </tr>
							<!-- Search goes here! -->
									<!-- Search end here -->
							
					<?php
					include 'connect.php';
					
					if(isset($_GET['searchbtn'])){
						$query = $_GET['searchbox'];

						$sql = "select * from products where category like '%$query%' or name like '%$query%'";

						$result = $db_link->query($sql);
						if($result->num_rows > 0){
							while($row = $result->fetch_array()){?>
						<tr align="center" style="height:30px">
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Category']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Name']; ?> </td>
							<td style="border-bottom:1px solid #333;">Php <?php echo $row['Retail']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Quantity']; ?> pcs. </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Supplier']; ?> </td>
							<td style="border-bottom:1px solid #333;">
							<a href="process_sales.php?id=<?php echo md5($row['ID']);?>"><input type="button" value="Pick" style="width:70px; height:25px; color:#FFF; background:#069; border:1px solid #0da223; border-radius:3px;"></a>
							</td>
						</tr>
						<?php
					
							}

						}else{
							echo "<center>No records</center>";
						}
					}
				$db_link->close();
				?>
				</table>
                </td>
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
						<p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
						<p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Item Form </p>
						</div>
						<br/>
					</div>
				</div>
			</div>
    </body>
</html>