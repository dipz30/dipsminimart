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
    <title>Supplier</title>
    <link href="Stylesheets/layout1.css" rel="stylesheet" type="text/css"/>
	
	<script>
			function toggle_visibility(id){
				var e = document.getElementById(id);
				if(e.style.display=='block')
					e.style.display = 'none';
				else
					e.style.display = 'block';
				}
			</script>
    </head>
    <body>
        <div class="bodywrap">
            <div class="topbar">
                <div id="head1"><form action="" method="post"><input type="submit" align="left" name="log" style="margin-top: 5px; margin-right: 62%; height: 70%; width:33%; " value="Logout"></form><!--<a name="log" style="text-decoration: none;"><pre id="logtext" align="left" style="margin-left: 5px;"><strong>Logout</strong></pre></a>--></div>
                <div id="head2"><a href="main.php" name="log" style="text-decoration: none; color:black"><pre id="pretxt"><strong>Mini Mart</strong></pre></a></div>
                <div id="head3"><input type="text" id="searchbar" placeholder="Search Supplier" name="searchbox" style="width: 78%; height: 70%; font-style: italic; text-align: center;"><input type="submit" id="searchbtn" name="searchbt" value="Search" id="searchbtn" style="width: 20%; height: 70%;"></div>
            </div>
            <div class="leftbar">
                <ul class="sub-menu2">
                    <li id="sm1"><a href="sales.php"><pre id="preli">Sales</pre></a></li>
                    <li id="sm1"><a href="products.php"><pre id="preli">Products</pre></a></li>
                    <li id="sm1"><a href="customer.php"><pre id="preli">Customers</pre></a></li>
                    <li id="sm1"><a href="supplier.php" id="sm2"class="current"><pre id="preli" class="preli">Supplier</pre></a></li>
                    <li id="sm1"><a href="salesreport.php"><pre id="preli">Sales Report</pre></a></li>
                </ul>
            </div>
			<div id="popup-box2" class="popup-position1">
			<div id="popup-wrapper1">
			<div id="popup-container1">
				<div id="popup-head-color1">
				<br>
				<p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Edit Supplier </p>
				</div>
			
			<?php
			
			 require'connect.php';
			
			$id = $_GET['id'];
			$view = "SELECT * from supplier where md5(ID) = '$id'";
			$result = $db_link->query($view);
			$row = $result->fetch_assoc();
			
			if(isset($_POST['update'])){
			
				$id = $_GET['id'];
			
				$suppliername = $_POST['suppliername'];
				$contactperson = $_POST['contactperson'];
				$address = $_POST['address'];
				$contactno = $_POST['contactno'];
				$note = $_POST['note'];
			
				$insert = "UPDATE supplier set Suppliername = '$suppliername', Contactperson = '$contactperson', Address = '$address', Contactno = '$contactno', Note = '$note' where md5(ID) = '$id'";
	
				if($db_link->query($insert)== TRUE){
						echo "Sucessfully update data";
						header('location:supplier.php');			
				}else{
			
					echo "Ooppss cannot update data" . $conn->error;
					header('location:supplier.php');
				}
				
				$db_link->close();
			}
			
			?>
			   
				<br>
				<form action="" method="POST">
				<table border="0" align="center">
				
				<tr>
				<td align="right">Supplier Name:</td>
				<td><input type="text" id="txtbox" name="suppliername" placeholder="Suppliername" value="<?php echo $row['Suppliername'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Contact Person:</td>
				<td><input type="text" id="txtbox" name="contactperson" placeholder="Contactperson" value="<?php echo $row['Contactperson'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Address:</td>
				<td><input type="text" id="txtbox" name="address" placeholder="Address" value="<?php echo $row['Address'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Contact No:</td>
				<td><input type="text" id="txtbox" name="contactno" maxlength="11" placeholder="Contact no" value="<?php echo $row['Contactno'];?>" required><br></td>
				</tr>
				
				<tr>
				<td align="right">Note:</td>
				<td><input type="text" id="txtbox" name="note" placeholder="Note" value="<?php echo $row['Note'];?>" required><br></td>
				</tr>    
				<br>
				<tr align="center">
				<td>&nbsp;  </td>
				<td>
				<br>
				<input type="SUBMIT" style="background-color:#4AA02C; height:40px; width:105px; border-radius:3px; color:#FFF;" name="update" id="btnnav" value="Update"></form>
				<a href="supplier.php"><input type="button" style=" background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancel"></a>
				
				</td>
				</tr>
				
				</table>
			</div>
			</div>
		</div>
			<div class="centerbar" id="centerbar">
				<div class="addsection">
					<form>
						 <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')">
							<input type="button" id="btnadd" value="+ Add Supplier" style="width: 14%; height: 95%; margin-top: 1px; margin-left: 86%;" />
						 </a>
					</form>
				</div>
				<div class="productinfo">
					<tbody>
						<tr align="center">
						<td colspan="7">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="40px" style="color:#033; margin-top: 5px;">

						<tr>
						 <th colspan="7" align="center" height="20px" style="border-bottom:1px solid #033; background: #033; color:#FFF;"> Supplier Information Table</th>
						</tr>
						
						</table>
						<div class="Scroll">
						<table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="30px" style="color:#033;">
						
						  <tr height="30px">
							<th style="border-bottom:1px solid #333;"> Supplier Name </th>
							<th style="border-bottom:1px solid #333;"> Contact Person </th>
							<th style="border-bottom:1px solid #333;"> Address </th>
							<th style="border-bottom:1px solid #333;"> Contact No. </th>
							<th style="border-bottom:1px solid #333;"> Note </th>
							<th style="border-bottom:1px solid #333;"> Action </th>
						  </tr>
							<!-- Search goes here! -->
							<!-- Search end here -->
								<?php
						   require('connect.php');
							$query="SELECT * FROM supplier";
							$result=mysqli_query($db_link, $query);?>
								<?php while ($row=mysqli_fetch_array($result)){?>
	
							<tr align="center" style="height:20px;">
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Suppliername']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Contactperson']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Address']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Contactno']; ?> </td>
							<td style="border-bottom:1px solid #333;"> <?php echo $row['Note']; ?> </td>
							<td style="border-bottom:1px solid #333;">
							<a href="edit_supplier.php?id=<?php echo md5($row['ID']);?>"><input type="button" value="Edit" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #0da223; border-radius:3px;"></a>|
							|<a href="delete_supplier.php?id=<?php echo md5($row['ID']);?>"><input type="button" value="Delete" style="width:50px; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
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
    </body>
</html>