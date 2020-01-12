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
				<li> 
					<a href="home.php">
						Welcome <?php echo($_SESSION['username']); ?> 
					</a> 
				</li>
				<li class="dropdownn" onmouseout="kkidupdate()"> 	
					<a id="kupdate"> 
						 <i class="fa fa-bell" aria-hidden="true"></i>  <p id="kid"> </p></a> 
					<ul class="dropdown-menuu" id="drppp">
						 no  new notification
					</ul>
				</li>
				<li> <a href="withdrawal.php"> Withdrawal </a> </li>
				<li> <a href="Deposit.php" class="active"> Deposit </a> </li>
				<li> <a href="Checkrecords.php">Check Records </a> </li>
				<li> <a href="Registeradmin.php">Register Admin </a> </li>
				<li> <a href="logout.php" class="klog">Logout </a> </li>
			</ul>
			
			
			<ul class="kmnav" style="position:sticky; top:0;">
				<li class="left">
				<a href="javascript:void(0)" id="cc" onclick="myFunction1()">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </a>
				</li>
				<li> <a href="home.php"><?php echo($_SESSION['username']); ?></a> </li>
				<li class="right" id="kdrp2" onclick="kdrp2()"> 	
					<span> <i class="fa fa-bell" aria-hidden="true"></i>  <p id="mkid"> </p></span> 
				</li>
			</ul>
			
			<div id="kdrpc2">
				<ul id="mdrppp">
					no  new notification
				</ul>
				<span class="kcan" onclick="kdrp12()"> x </span>
			</div>
			
			<ul id="kdrpc">
				<li> <a href="withdrawal.php" onclick="myFunction1()"> Withdrawal </a> </li>
				<li> <a href="Deposit.php" onclick="myFunction1()"> Deposit </a> </li>
				<li> <a href="Checkrecords.php" onclick="myFunction1()">Check Records </a> </li>
				<li> <a href="Registeradmin.php" onclick="myFunction1()">Register Admin </a> </li>
				<li> <a href="index.php" class="klog" onclick="myFunction1()">Logout </a> </li>
			</ul>

			
			<div id="kmh">
				<h2 class="ktrans">
					Deposit
				</h2>
			
				<hr>
				
			</div>
			<div  class="kform">
				<form method="post" action="Deposit.php" id="comment_form" name="kdform">
				
					<input type="text" name="fromname" placeholder="SENDER" class="kinput"/>
					
					<input type="text" name="toname"  placeholder="RECIPIENT" class="kinput"/>
					
					<input type="number" name="amount" placeholder="Amount" class="kinput"/>
					
					<input type="number" name="commission" placeholder="COMMISION" class="kinput"/>
					
					<select  name="destination" id="destination" class="kinput">
						<option value="selectdestination" class="kinput">Select Destination</option>
						<option value="ogrugu" class="kinput">Ogrugu</option>
						<option value="lagos" class="kinput">Lagos</option>
					</select>

					<div class="kdepposit" id="kdeposit"></div>
															
				</form>
				
			<a href="JavaScript:void(0)" class="btn btn-info kinput" onclick="kdep()">Transfer</a>			
			</div>			
			
			<footer>
				 Kollyn's Money 2019
			</footer>
			
			<script src="mobnav.js"></script>
		</body>
	</html>