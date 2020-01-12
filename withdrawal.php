<?php  include('sessionhandle.php');?>
<!Doctype html>
	<html>
	
		<head>
		
			<title>
				Kollyn's Money - Withdrawal
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
			
		<nav>	<ul class="knav">
				<li> <a href="home.php">
						Welcome <?php echo($_SESSION['username']); ?> 
					</a> 
				</li>
				<li class="dropdownn" onmouseout="kkidupdate()"> 	
					<a id="kupdate"> 
						 <i class="fa fa-bell" aria-hidden="true"></i> 
						  <p id="kid"> </p></a> 
					<ul class="dropdown-menuu" id="drppp">
						 no  new notification
					</ul>
				</li>
				<li> <a href="withdrawal.php"  class="active"> Withdrawal </a> </li>
				<li> <a href="Deposit.php"> Deposit </a> </li>
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

			
			<div class="klcontainer">
				List of Received Transactions
				<hr />
				
				<?php
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
					$lock = $_SESSION['location'];
					$kkkst = "Not Cleared";
					$queryq = "SELECT * FROM transaction  WHERE destination = '$lock' AND cleared = '$kkkst'  ORDER BY id DESC LIMIT 20";
					$resultr = mysqli_query($db, $queryq);

					$kount = mysqli_num_rows($resultr); 
					if ( $kount >0) : ?>
						<table class="kctable">
								<tr>
									<th> AGENT </th>
									<th> LOCATION </th>
									<th> FROM </th> 
									<th> TO </th> 
									<th> AMOUNT </th>
									<th> DATE </th> 
									<th> ACTION </th> 
								</tr> 
								
						<?php 
							while($roww = mysqli_fetch_array($resultr))	: ?>
							
								<tr>
									<td> <?php echo $roww["transagent"] ;?> </td>
									<td> <?php echo $roww["location"] ;?> </td>
									<td> <?php echo $roww["fromname"] ; ?> </td> 
									<td> <?php  echo $roww["toname"] ; ?> </td>
									<td> <?php echo $roww["amount"]; ?> </td>
									<td> <?php echo  $roww["transdate"] ; ?> </td> 
									<td style="text-align:center;padding:0px;"> <a href='JavaScript:void(0)' class="btn btn-success" style="width:100%; margin:0px;" onclick='kbtn<?php echo  $roww["id"] ; ?>()'> Withdraw </a> </td>
									<script> 
							
										function kbtn<?php echo  $roww["id"] ; ?>() {
											document.getElementById("kwithdrawal").style.display="block";
											document.getElementById("kwithdrawal").innerHTML = 
												"<strong style='color:green;'><?php  echo $roww['toname'] ; ?> </strong> will be withdrawing <strong style='color:green;'> <?php echo  $roww['amount'] ; ?> </strong>sent from <strong style='color:green;'><?php  echo $roww['fromname'] ; ?> </strong> on <strong style='color:green;'> <?php  echo $roww['transdate'] ; ?> </strong> <br /> Re-enter Amount to Proceed <br /> <p id='kwithdrawall'> </p> <br/> <form name='kkfm'> <input type='number' name='konfff' placeholder='Re-enter Amount' required /> </form> <br /> <a href='JavaScript:void(0)' class='btn btn-success' style='margin-top:10px;' onclick='ksubmmmit<?php echo  $roww["id"] ; ?>() '> Submit</a> <br /> <a href='JavaScript:void(0)' class='btn btn-warning' style='margin-top:20px;' onclick='koutt()'>Back </a>";
										}
										function ksubmmmit<?php echo  $roww["id"] ; ?>() {
											var kxxx = document.forms["kkfm"]["konfff"].value;
											if ( kxxx != '<?php echo $roww["amount"]; ?>'){
												document.getElementById("kwithdrawall").innerHTML="<i style='color:red'> Wrong Amount</i>";
											} else {
												var hr = new XMLHttpRequest();
												hr.onreadystatechange = function() {
													if (this.readyState == 4 && this.status == 200) {
														document.getElementById("kwithdrawal").innerHTML = this.responseText;
													}
												}	
												hr.open("POST", "kkupdate.php", true);
												hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
												var vars ='kdp=<?php echo  $roww["id"] ; ?>';
												hr.send(vars);
											}
										}											
									</script>
								</tr>
								
							<?php endwhile?> 
						</table>
						<?php else : echo('<b style="color:green">All Deposits Withdrawn</b>'); endif  ?>
			</div>
			
			<div class="kwithdrawal" id="kwithdrawal"></div>
			
			<footer>
				Copy right- Collins Money 2019
			</footer>
			
			<script src="mobnav.js"></script>
			
		</body>
	</html>