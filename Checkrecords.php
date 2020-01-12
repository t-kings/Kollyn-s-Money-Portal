<?php  include('sessionhandle.php');?>
<!Doctype html>
	<html>
	
		<head>
		
			<title>
				Kollyn's Money - Deposit
			</title>
			
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

			<!-- jQuery library -->	
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<link href="css/bootstrap.css" rel="stylesheet" />
			<link rel="stylesheet" type="text/css" href="style.css" />
			<link href="css/bootstrap-theme.css" rel="stylesheet" />
			<script src="js/bootstrap.min.js"></script>	
			
		</head>
		
		
		<body>
		
			<div class="kheader">
				<b style="color:black">Kollyn's</b>  <b style="color:green">Money</b>
			</div>
			
			<ul class="knav">
				<li> <a href="home.php">
						Welcome <?php echo($_SESSION['username']); ?> 
					</a> 
				</li>
				<li class="dropdownn" onmouseout="kkidupdate()"> 	
					<a id="kupdate"> 
						 <i class="fa fa-bell" aria-hidden="true"></i>   <p id="kid"> </p></a> 
					<ul class="dropdown-menuu" id="drppp">
						 no  new notification
					</ul>
				</li>
				<li> <a href="withdrawal.php"> Withdrawal </a> </li>
				<li> <a href="Deposit.php"> Deposit </a> </li>
				<li> <a href="Checkrecords.php" class="active">Check Records </a> </li>
				<li> <a href="Registeradmin.php">Register Admin </a> </li>
				<li> <a href="logout.php" class="klog">Logout </a> </li>
			</ul>
			
			<ul class="kmnav">
				<li class="left" id="kdrp" onclick="kdrp()"> <span class="glyphicon glyphicon-list"> </span> </li>
				<li>  <a href="home.php"><?php echo($_SESSION['username']); ?></a></li>
				<li class="right" id="kdrp2" onclick="kdrp2()"> 	
					<span class="glyphicon glyphicon-bell">  <p id="mkid"> </p></span> 
				</li>
			</ul>

			<div id="kdrpc2">
				<ul id="mdrppp">
					no  new notification
				</ul>
				<span class="kcan" onclick="kdrp12()"> x </span>
			</div>
			
			<ul id="kdrpc">
				<li> <a href="withdrawal.php"> Withdrawal </a> </li>
				<li> <a href="Deposit.php"> Deposit </a> </li>
				<li> <a href="Checkrecords.php">Check Records </a> </li>
				<li> <a href="Registeradmin.php">Register Admin </a> </li>
				<li> <a href="index.php" class="klog">Logout </a> </li>
				<span class="kcan" onclick="kdrp1()"> x </span>
			</ul>
			
			
			<div class="klcontainer">
				<h3 class="ktrans">
					Check Records
				</h3>
			
				<hr>
				
				<form name='kcr' >
				
					<table class="kklcontainer">
					
						<tr style="padding:0px;"> 
							<td colspan="2" style="padding:0px;">	
								<b>Select Date Range</b>
							</td>

							<td>
							</td>
							
							<td>
							</td>
							
							<td>
							</td>
						</tr>
						
						<tr> 
							<td>
								<b>start date date </b><br/> <input style="width:80%;height:2vw;"  type="date" name="recdate1" /> 
							</td>
							
							<td>
								<b> end date </b><br/> <input style="width:80%;height:2vw;" type="date" name="recdate2" /> 
							</td>
							
							<td>
								<b>Select Agent</b>

								<?php 
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
									$sql9 = "SELECT username FROM admin";
									$result8 = $db->query($sql9); 
								?> 
								<select name="recagent">
									<option value="">All Agents</option>
									<?php
										while($row0 = $result8->fetch_assoc()) :	
									?>
									<option value="<?php echo  $row0["username"]; ?>"><?php echo  $row0["username"]; ?></option>
									<?php endwhile ?>
								</select> 
							</td>
							
							<td>
								 <b>Select Location </b>
								<?php
									$sql99 = "SELECT location FROM admin";
									$result88 = $db->query($sql99); 
								?> 
								<select name="locationsearch">
									<option value="">All Location</option>
									<?php
										while($row00 = $result88->fetch_assoc()) :
									?>
									<option value="<?php echo  $row00["location"]; ?>"><?php echo  $row00["location"]; ?></option>
									<?php endwhile ?>
								</select> 
							</td>
							
							<td>
								<b>Select Destination </b>
								<?php
									$sqlt9 = "SELECT location FROM admin";
									$resultt8 = $db->query($sqlt9); 
								?> 
								<select name="recdestination">
									<option value="">All Destinations</option>
									<?php
										while($rowt0 = $resultt8->fetch_assoc()) :
									?>
									<option value="<?php echo  $rowt0["location"]; ?>"><?php echo  $rowt0["location"]; ?></option>
									<?php endwhile ?>
								</select> 
							</td>
							
						</tr>
					</table>
					<input type="reset" class="kreset" value="Reset to Default Values" />
				</form>
				<button class="btn btn-success" style="width:90%;" onclick="searchRecords()"  name="searchRecords"> Filter </button>
				
			</div>
			
			<div class="klcontainer" id="ksrf">
				
				<?php 
					$reccdate= date("Y-m-d");
					$sqll = "SELECT  *  FROM transaction WHERE transdate = '$reccdate'" ;
					$resultt = $db->query($sqll); 
				?>
				<h3> Today's Record (<?php echo $reccdate ?>) </h3>
				<hr/>
				<?php if(mysqli_num_rows($resultt) > 0) : ?>
				<table  class="kctable"> 
					<tr style = "color:blue;">  
						<th> AGENT</th>
						<th> FROM </th> 
						<th> TO </th> 
						<th> DATE </th> 
						<th> Amount </th>
						<th> COMMISSION </th>
					</tr>				
				<?php
					$rowamount = 0;
					$rowcom = 0;
					while($roww = $resultt->fetch_assoc()): 
					$rowamount  += $roww['amount'];
					$rowcom  += $roww['commission'];
				?>

					<tr> 
						<td> <?php echo $roww["transagent"] ;?> </td>
						<td> <?php echo $roww["fromname"] ; ?>, <?php echo $roww["location"] ;?> </td> 
						<td> <?php  echo $roww["toname"] ; ?>,  <?php echo $roww["destination"]; ?>  </td>
						<td> <?php echo  $roww["transdate"] ; ?> </td>
						<td> <?php echo $roww["amount"]; ?> </td> 
						<td> <?php echo $roww["commission"]; ?> </td> 
					</tr>
					
					<?php endwhile ?>
					
					<tr style = "color:red;">  
						<th colspan="4" style="text-align:center;"> TOTAL </th>
						<th> <?php echo $rowamount ?> </th> 
						<th> <?php echo $rowcom ?> </th>
					</tr>
				</table>
				<?php else : echo ('No Transactions Today, Use the Search for older transactions') ; endif ?>
			</div>
			<footer>
				 Kollyn's Money 2019
			</footer>
			
				<script src="mobnav.js"></script>
		</body>
	</html>