<?php  include('sessionhandle.php');?>
<!Doctype html>
	<html>
	
		<head>
		
			<title>
				Kollyn's Money - Home
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
		
			<header class="kheader">
				<b style="color:black">Kollyn's</b>  <b style="color:green">Money</b>
</header>
			
			<ul class="knav">
				<li> 
					<a href="home.php" class="active">
						Welcome <?php echo($_SESSION['username']); ?> 
					</a> 
				</li>
				<li class="dropdownn" onmouseout="kkidupdate()"> 	
					<a href="JavaScript:void(0)" id="kupdate"">
						 <i class="fa fa-bell" aria-hidden="true"></i>  
						 <p id="kid"> </p>
					</a> 
					<ul class="dropdown-menuu" id="drppp">
						 no  new notification
					</ul>
				</li>
				<li> <a href="withdrawal.php"> Withdrawal </a> </li>
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
			<div class="flex-container">
							<div class="kcontainer">
					Recently Received Transactions
					<hr />
					<?php 
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
						$userme = $_SESSION['location'];
						$userlo = $_SESSION['username'];
						$sqll = "SELECT  *  FROM transaction WHERE destination = '$userme' ORDER BY id DESC LIMIT 10" ;
						$resultt = $db->query($sqll); 
						if(mysqli_num_rows($resultt) > 0) : ?>
							
							<table  class="kctable"> 
					<tr style = "color:blue;">  
						<th> Date</th>
						<th> FROM </th> 
						<th> TO </th> 
						<th> Amount </th> 
						<th> Agent </th>
						<th> Status </th>
					</tr>	
								<?php while($rowt = mysqli_fetch_array($resultt)): ?>
							
					<tr> 
						<td>  <?php echo $rowt["transdate"]?> </td>
						<td>  <?php echo $rowt["fromname"] ?>, <?php echo $rowt["location"] ;?> </td> 
						<td> <?php echo $rowt["toname"]?>,  <?php echo $rowt["destination"]; ?>  </td>
						<td>  <?php echo $rowt["amount"] ?> </td>
						<td> <?php echo $rowt["transagent"]?> </td> 
						<td style="color:red"><strong><?php echo $rowt["cleared"]?> </strong> </td> 
					</tr>	
								<?php endwhile ?>
</table>
							<a href="Checkrecords.php" > Click to See more Transactions </a>
							<?php else : echo ('No recent transactions') ; endif ?>
				</div>
				
				<div class="kcontainer">
					Recently Sent Transactions
					<hr/>
					<?php 
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
						$userme = $_SESSION['username'];
						$sqll = "SELECT  *  FROM transaction WHERE transagent = '$userme' ORDER BY id DESC LIMIT 10" ;
						$resultt = $db->query($sqll); 
						if(mysqli_num_rows($resultt) > 0) : ?>
							
							
							<table  class="kctable"> 
					<tr style = "color:blue;">  
						<th> Date</th>
						<th> FROM </th> 
						<th> TO </th> 
						<th> Amount </th> 
						<th> Agent </th>
						<th> Status </th>
					</tr>	
								<?php while($rowt = mysqli_fetch_array($resultt)): ?>
								
							
								<tr> 
						<td>  <?php echo $rowt["transdate"]?> </td>
						<td>  <?php echo $rowt["fromname"] ?>, <?php echo $rowt["location"] ;?> </td> 
						<td> <?php echo $rowt["toname"]?>,  <?php echo $rowt["destination"]; ?>  </td>
						<td>  <?php echo $rowt["amount"] ?> </td>
						<td> <?php echo $rowt["transagent"]?> </td> 
						<td style="color:red"><strong><?php echo $rowt["cleared"]?> </strong> </td> 
					</tr>	
								<?php endwhile ?>
</table>
							<a href="Checkrecords.php" > Click to See more Transactions </a>
							<?php else : echo ('No recent transactions') ; endif ?>
				</div>
			</div>
			
			
			<footer>
				 Kollyn's Money 2019
			</footer>
			
			

			<script src="mobnav.js"></script>
				
		</body>
		
		
	</html>