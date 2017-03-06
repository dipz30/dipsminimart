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
    <title>Products</title>
    <link href="Stylesheets/layout1.css" rel="stylesheet" type="text/css"/>
    </head>
	
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
                <div id="head1"><form action="" method="post"><input type="submit" align="left" name="log" style="margin-top: 5px; margin-right: 62%; height: 70%; width:33%; " value="Logout"></form><!--<a name="log" style="text-decoration: none;"><pre id="logtext" align="left" style="margin-left: 5px;"><strong>Logout</strong></pre></a>--></div>
                <div id="head2"><a href="main.php" name="log" style="text-decoration: none; color:black"><pre id="pretxt"><strong>Mini Mart</strong></pre></a></div>
                <div id="head3"><input type="text" id="searchbar" name="searchbox" placeholder="Search Products" style="width: 78%; height: 70%; font-style: italic; text-align: center;"><input type="submit" id="searchbtn" name="searchbt" value="Search" id="searchbtn" style="width: 20%; height: 71%;"></div>
            </div>
            <div class="leftbar">
                <ul class="sub-menu2">
                    <li id="sm1"><a href="sales.php"><pre id="preli">Sales</pre></a></li>
                    <li id="sm1"><a href="products.php" id="sm2"class="current"><pre id="preli" class="preli">Products</pre></a></li>
                    <li id="sm1"><a href="customer.php"><pre id="preli">Customers</pre></a></li>
                    <li id="sm1"><a href="supplier.php"><pre id="preli">Supplier</pre></a></li>
                    <li id="sm1"><a href="salesreport.php"><pre id="preli">Sales Report</pre></a></li>
                </ul>
            </div>
            <div class="centerbar" id="centerbar">
				<div class="addsection">
					<form>
						 <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')">
							<input type="button" id="btnadd" value="+ Add Products" style="width: 14%; height: 95%; margin-top: 1px; margin-left: 86%;" />
						 </a>
					</form>
				</div>
				<!--Pop Menu-->
			<div id="popup-box2" class="popup-position1">
			<div id="popup-wrapper1">
			<div id="popup-container1">
				<div id="popup-head-color1">
				<br>
				<p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Edit Item </p>
				</div>
			
			<?php
			
			include 'connect.php';
			
			$id = $_GET['id'];
			$view = "SELECT * from products where md5(ID) = '$id'";
			$result = $db_link->query($view);
			$row = $result->fetch_assoc();
			
			if(isset($_POST['update'])){
			
				$id = $_GET['id'];
			
				$category = $_POST['category'];
				$name = $_POST['name'];
				$quantity = $_POST['quantity'];
				$purchase = $_POST['purchase'];
				$retail = $_POST['retail'];
				$supplier = $_POST['supplier'];
			
				$insert = "UPDATE products set Category = '$category', Name = '$name', Quantity = '$quantity', Purchase = '$purchase', Retail = '$retail', Supplier = '$supplier' where md5(ID) = '$id'";
				
				if($db_link->query($insert)== TRUE){
			
						echo "Sucessfully update data";
						header('location:products.php');			
				}else{
			
					echo "Ooppss cannot add data" . $conn->error;
					header('location:products.php');
				}
				
				$db_link->close();
			}
			
			?>
			   
				<br>
				<form action="" method="POST">
				<table border="0" align="center">    
				<tr>
				<td align="right">Category:</td>
				<td>
				<select name="category" id="txtbox">
				<option> <?php echo $row['Category']; ?> </option>
				</select>
				</td>
				</tr>
				
				<tr>
				<td align="right">Name:</td>
				<td><input type="text" id="txtbox" name="name" placeholder="Name" value="<?php echo $row['Name'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Quantity:</td>
				<td><input type="text" id="txtbox" name="quantity" placeholder="Quantity" value="<?php echo $row['Quantity'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Purchse Amount:</td>
				<td><input type="text" id="txtbox" name="purchase" placeholder="Purchase amnt" value="<?php echo $row['Purchase'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Retailer Price:</td>
				<td><input type="text" id="txtbox" name="retail" placeholder="Retail" value="<?php echo $row['Retail'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Supplier:</td>
				<td>
				<select name="supplier" id="txtbox">
				
			<?php
			require('connect.php');
			$query="SELECT Suppliername FROM supplier";
			$result1=mysqli_query($db_link, $query);
			while ($row1=mysqli_fetch_array($result1)){?>
				<option><?php echo $row1['Suppliername']; ?></option>
				   <?php
			}?>
				
				</select>
				</td>
				</tr>
				
				<br>
				<tr  align="center">
				<td>&nbsp;  </td>
				<td>
				<br>
				<input type="SUBMIT" name="update" style="background-color:#4AA02C; height:40px; width:105px; color:#FFF;" id="btnnav" value="Update"></form>
				<a href="products.php"><input type="button" style="background:#900; height:40px; width:105px; color:#FFF;" value="Cancel"></a>
				
				</td>
				</tr>
				
				</table>
			
			</div>
			</div>
			</div>
		<!--End of Pop menu-->>
		<!--Start of Update Form-->>
			<div class="productinfo">
					<tbody>
						<tr align="center">
						<td colspan="7">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="40px" style="color:#033; margin-top: 5px;">

						<tr>
						 <th colspan="7" align="center" height="20px" style="border-bottom:1px solid #033; background: #033; color:#FFF;"> Products Information Table</th>
						</tr>
						
						</table>
						<div class="Scroll">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="px" style="color:#033;">
						
						  <tr height="30px">
							<th style="border-bottom:1px solid #333;"> Category </th>
							<th style="border-bottom:1px solid #333;"> Name </th>
							<th style="border-bottom:1px solid #333;"> Quantity Left </th>
							<th style="border-bottom:1px solid #333;"> Purchase </th>
							<th style="border-bottom:1px solid #333;"> Retail </th>
							<th style="border-bottom:1px solid #333;"> Supplier </th>
							<th style="border-bottom:1px solid #333;"> Action </th>
						  </tr>
							<!-- Search goes here! -->
							<!-- Search end here -->
								<?php
						   require('connect.php');
							$query="SELECT * FROM products";
							$result=mysqli_query($db_link, $query);?>
								<?php while ($row=mysqli_fetch_array($result)){?>
	
							<tr align="center" style="height:20px;">
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Category']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Name']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Quantity']; ?> pcs. </td>
							<td style="border-bottom:1px solid #333;">Php <?php echo $row['Purchase']; ?> </td>
							<td style="border-bottom:1px solid #333;">Php <?php echo $row['Retail']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Supplier']; ?> </td>
							<td style="border-bottom:1px solid #333;">
							<a href="edit_item.php?id=<?php echo md5($row['ID']);?>"><input type="button" value="Edit" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #0da223; border-radius:3px;"></a>|
							|<a href="delete_item.php?id=<?php echo md5($row['ID']);?>"><input type="button" value="Delete" style="width:50px; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
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
			</div>
            <div class="buttombar"> <pre style="margin-top: 40px; text-align: center;"> &copy; 2016 All Rights Reserved.  |  Designed By:<a href="https://www.facebook.com/jadejastine.diputado">Jade Jastine Diputado</a></pre></div>
        </div>
			  <br>
			  <tr>
				<td>
				<table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
				
				 <tr>
				 <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #033; color:#FFF;"> Products 	</th>
				</tr>
				
				  <tr height="30px">
					<th style="border-bottom:1px solid #333;"> Category </th>
					<th style="border-bottom:1px solid #333;"> Name </th>
					<th style="border-bottom:1px solid #333;"> Quantity Left </th>
					<th style="border-bottom:1px solid #333;"> Purchase </th>
					<th style="border-bottom:1px solid #333;"> Retail </th>
					<th style="border-bottom:1px solid #333;"> Supplier </th>
					<th style="border-bottom:1px solid #333;"> Action </th>
				  </tr>
				  
				   <?php
			require('connect.php');
			$query="SELECT * FROM products";
			$result=mysqli_query($db_link, $query);
			while ($row=mysqli_fetch_array($result)){?>
				  
				  <tr align="center" height="25px;">
					<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
					<td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
					<td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
					<td style="border-bottom:1px solid #333;">Php <?php echo $row['purchase']; ?> </td>
					<td style="border-bottom:1px solid #333;">Php <?php echo $row['retail']; ?> </td>
					<td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
					<td style="border-bottom:1px solid #333;">
					
					
					<a href="edit_item.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Edit" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>/<a href="delete.php"><input type="button" value="Delete" style="width:50px; height:20px; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
					
					</td>
					</td>
				  </tr>
			   <?php
			}?>
				  
				</table>
			  </td>
			  </tr>
			</table>
	</div>
    </body>
</html>