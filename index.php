<?php include('mainserver.php'); ?>

<!Doctype html>
	<html>
		<head>
		<title>Kollyn's Money</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
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
		
			<header class="klheader">
				<b style="color:black">Kollyn's</b>  <b style="color:green">Money</b>
			</header>
			
			<section class="kform">
				<form method="post" action="index.php" name="kklog">
					Login
					<br>
					
					<span style="color:red;">
			
											<?php 
										if ($error5 ==! "" ) :?>
											<?php	echo $error5; ?>
											</br>
									<?php endif ?>
																		<?php 
										if ($error6 ==! "" ) :?>
											<?php	echo $error6; ?>
											</br>
									<?php endif ?>
																		<?php 
										if ($error7 ==! "" ) :?>
											<?php	echo $error7; ?>
											</br>
									<?php endif ?>
									</span>
				
					<?php
					$sqllog = "SELECT username, location FROM admin";
					$resultlog = $db->query($sqllog); ?> 
					<select  name="logusername" class="kinput" recquired/>
					
					
					<option value="username">Select Cashier</option>
					<?php
					
					
					while($rowlog = $resultlog->fetch_assoc()) :
					
						
					?>
						<option value="<?php echo  $rowlog["username"];  ?>"><?php echo  $rowlog["username"]; ?> - <?php echo  $rowlog["location"]; ?></option>
						
						
						<?php endwhile ?>
					</select>
					
					<input type="password" placeholder="Password" name="logpassword" class="kinput" recquired/>
					
					<button type="submit" class="btn btn-success kinput" name="login"> Login </button>
					
				</form>
				

				
			</section>
			<footer>
				 Kollyn's Money 2019
			</footer>
				
				
		</body>
		
		
	</html>