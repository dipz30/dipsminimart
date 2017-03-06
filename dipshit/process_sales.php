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
    <title>Sales</title>
    <link href="Stylesheets/layout1.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="bodywrap">
            <div class="topbar">
                <div id="head1"><form action="" method="post"><input type="submit" align="left" name="log" style="margin-top: 5px; margin-right: 62%; height: 70%; width:33%; " value="Logout"></form><!--<a name="log" style="text-decoration: none;"><pre id="logtext" align="left" style="margin-left: 5px;"><strong>Logout</strong></pre></a>--></div>
                <div id="head2"><a href="main.php" name="log" style="text-decoration: none; color:black"><pre id="pretxt"><strong>Mini Mart</strong></pre></a></div>
                <div id="head3"><form action="result_sales.php" method="get" ecntype="multipart/data-form"><input type="text" id="searchbar" name="searchbox" placeholder="Search Products" style="width: 78%; height: 70%; font-style: italic; text-align: center;"><input type="submit" id="searchbtn" name="searchbtn" value="Search" style="width: 20%; height: 71%;"></form></div>
            </div>
            <div class="leftbar">
                <ul class="sub-menu2">
                    <li id="sm1"><a href="sales.php" id="sm2" class="current"><pre id="preli" class="preli">Sales</pre></a></li>
                    <li id="sm1"><a href="products.php"><pre id="preli">Products</pre></a></li>
                    <li id="sm1"><a href="customer.php"><pre id="preli">Customers</pre></a></li>
                    <li id="sm1"><a href="supplier.php"><pre id="preli">Supplier</pre></a></li>
                    <li id="sm1"><a href="salesreport.php"><pre id="preli">Sales Report</pre></a></li>
                </ul>
            </div>
            <div class="centerbar" id="centerbar">
				<div id="popup-box2" class="popup-position1">
					<div id="popup-wrapper2">
						<div id="popup-container2">
							<div id="popup-head-color5">
								<p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"><br>Transaction Form <br>
								<br>
								</p>
							</div>
											
						<?php
							include 'connect.php';
							
							$id = $_GET['id'];
							$view = "SELECT * from products where md5(ID) = '$id'";
							$result = $db_link->query($view);
							$row = $result->fetch_assoc();
							
							if(isset($_POST['update'])){
							
								$ID = $_GET['id'];
								
							$view1 = "SELECT Quantity from products where md5(ID) = '$ID'";
							$result1 = $db_link->query($view);
							$row2 = $result->fetch_assoc();
								
								$quant = $_POST['quant'];
								$dates=$_POST['dates'];
								$quantity=$_POST['quantity'];
								
								$customers=$_POST['Customer'];
								$category=$_POST['category'];
								$name=$_POST['name'];
								$amount=$_POST['amount'];
								$quant=$_POST['quant'];
								$total=$_POST['total'];
								$tendered=$_POST['tendered'];
								$changed=$_POST['changed'];
								$prof = $_POST['profit'];
							
								$insert1 = "UPDATE products set Quantity = Quantity - '$quant' where md5(ID) = '$ID'";
								$insert = "INSERT INTO sales(Date,Customer,Category,Name,Amount,Quantity,Total,Profit,Tendered,Changes) VALUES('$dates','$customers','$category','$name','$amount','$quant','$total','$prof','$tendered','$changed')" or die("error".mysqli_errno($db_link));
								$result=mysqli_query($db_link,$insert);
								if($db_link->query($insert1)== TRUE){
							
										echo "Sucessfully update data";
										header('location:sales.php');			
								}
								
								$db_link->close();
							}
							
							?>
							   
								<br>
								<form action="" method="POST">
								
								<table border="0" align="center">  
								
								<?php
								
								if(isset($_POST['sub']))
								{
								
								@$total = $_POST['total'];
								@$tendered = $_POST['tendered'];
								@$quant = $_POST['quant'];
								@$profit = $_POST['profit'];
								
								@$profit = $profit;
								@$quant = $quant;
								@$ten = $tendered;
								@$change = $tendered - $total;
								}
								
								?>
								
								<tr>
								<td align="right"> Date Today: </td>
								<td> <input type="text" name="dates" id="txtbox" value="<?php echo "  ". date("Y/m/d")?>" readonly> </td>
								</tr>
							
								<tr>
								<td align="right">Customers:</td>
								<td>
								<select name="customers" id="txtbox" readonly>
								
								<?php
								require('connect.php');
								$query="SELECT * FROM customers";
								$result=mysqli_query($db_link, $query);
								while ($row1=mysqli_fetch_array($result)){?>
								
								<option><?php echo $row1['Name']; ?></option>
													
								<?php
							}?>
								
								</select>
								</td>
								</tr>
								
								<tr>
								<td align="right">Category:</td>
								<td><input type="text" id="txtbox" name="category" value="<?php echo $row['Category'];?>" readonly><br></td>
								</tr>
								
								<tr>
								<td align="right">Product name:</td>
								<td><input type="text" id="txtbox" name="name" value="<?php echo $row['Name'];?>" readonly><br></td>
								</tr>
								
								  
								<!-- Computation starts here -->
								
								<form action="" method="POST">
								
								<?php
								
								if(isset($_POST['calculate']))
								{
								@$amnt = $_POST['amount'];
								@$quant = $_POST['quant'];
								@$profit = $_POST['profit'];
								@$purchase = $_POST['purchase'];
								
								@$quant = $quant;
								@$total = $amnt * $quant;
								@$profit = $total - $quant * $purchase;
								}
								
								
								?>
								
								<form action="" method="post">
								<tr>
								<td><input type="text" id="txtbox" name="purchase" value="<?php echo $row['Purchase'];?>" hidden><br></td>
								</tr>
								
								<tr>
								<td align="right">Retail Amnt:</td>
								<td><input type="text" id="txtbox" name="amount" value="<?php echo $row['Retail'];?>" readonly><br></td>
								</tr>
								
								<tr>
								<td align="right">Quantity:</td>
								<td><input type="text" id="txtbox" name="quant" value="<?php echo @$quant ?>" placeholder="quantity" required></td>
								</tr>
								
								<tr>
								<td align="right">Total Payable Amount:</td>
								<td><input type="text" id="txtbox" name="total" value="<?php echo @$total ?>" readonly></td>
								<td><input type="submit" name="calculate" value="Compute" id="btncalc"></td>
								</tr>
								
								<tr>
								<td align="right">Profit:</td>
								<td><input type="text" id="txtbox" name="profit" value="<?php echo @$profit ?>" readonly><br></td>
								</tr>
							
								</form>
								
								
								<tr>
								<td align="right">Tendered:</td>
								<td><input type="text" id="txtbox" value="<?php echo @$ten ?>" name="tendered" placeholder="Tendered"></td>
								<td><input type="submit" value="Calculate" name="sub" id="btncalc"></td>
								</tr>
								
								<tr>
								<td align="right">Return Change:</td>
								<td><input type="text" id="txtbox" name="changed" value="<?php echo @$change ?>" readonly></td>
								</tr>
								
								</form>
								
								<!-- Computation ends here -->
								
								
								<br>
								<tr  align="center">
								<td>&nbsp;  </td>
								<td>
								<br>
								<input type="SUBMIT" name="update" id="btnnav" value="Add" style="background:#00ae00; height:30px; width:85px; color:#FFF;"></form>
								<a href="sales.php"><input type="button" style="background:#900; height:30px; width:85px; color:#FFF;" value="Cancel"></a>
								
								</td>
								</tr>
								
								</table>
							
							</div>
							</div>
							</div>
							  
					<div class="productinfo">
						<tbody>
							<tr align="center">
								<td colspan="7">
							<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="40px" style="color:#033;">
	
							<tr>
								 <th colspan="7" align="center" height="20px" style="background: #5a7155; color:#FFF;"> Products Information Table</th>
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
								require('connect.php');
								$query="SELECT * FROM products";
								$result=mysqli_query($db_link, $query);
									while ($row=mysqli_fetch_array($result)){
										?>
							   
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
						 }?>
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