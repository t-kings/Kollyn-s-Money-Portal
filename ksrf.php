<?php session_start();
	$p = $_POST['p'];
	$q = $_POST['q'];
	$r = $_POST['r'];
	$s = $_POST['s'];
	$t = $_POST['t'];
	
	$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
	
	$whereClauses = array();
	
	$where = ''; 
	
	if (! empty($r)){ 
		$whereClauses[] ="transagent='".mysqli_real_escape_string($db, $r)."'";
	}
	
	if (! empty($t)){
		$whereClauses[] ="destination='".mysqli_real_escape_string($db, $t)."'"; 
	}
	
	if (! empty($s)){ 
		$whereClauses[] ="location='".mysqli_real_escape_string($db, $s)."'";
	}
	     
	if (! empty($p) and !empty($q)){ 
		$whereClauses[] ="transdate BETWEEN'".mysqli_real_escape_string($db, $p)."' AND '".mysqli_real_escape_string($db, $q)."'"; 
	}

    if (count($whereClauses) > 0) { 
		$where = ' WHERE '.implode(' AND ',$whereClauses); 
	}
	
	$sqll = "SELECT  *  FROM transaction" .$where;
	$resultt = $db->query($sqll);
	
?>

<!Doctype html>
	<html>
	
		<head>

		</head>
		
		
		<body>
		<?php
			if (mysqli_num_rows($resultt) > 0) : ?>
				<h3> Search Result </h3> <hr/>
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
		<?php  else : echo( 'No result found for filter parameters'); endif?>
		</body>
	</html>