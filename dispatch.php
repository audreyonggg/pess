<?php
//if(!isset($_POST['btnProcessCall']) && !isset($_POST['btnSubmit']))
	//header("Location: logcall.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Dispatch</title>
</head>

<body>
<?php
/*Search and retrieve similar pending incidents and populate a table*/
//connect to a database
$con = mysql_connect("localhost", "audrey", "T0126841JAUDREy");
	if(!$con)
	{
	die("Cannot connect to database:".mysql_error());
	}

//select a table in the database
mysql_select_db("pess_audrey", $con);

$sql = "SELECT patrolCarID, statusDesc FROM patrolcar JOIN patrolcar_status On patrolcar.patrolcarStatusID = patrolcar_status.statusID WHERE patrolcar.patrolcarStatusID = '2' OR patrolcar.patrolcarStatusID = '3'";
$result = mysql_query($sql, $con);

$incidentArray; 
$count = 0;

while($row = mysql_fetch_array($result))
{
	$patrolcarArray[$count] = $row;
	$count++;
}

if(!mysql_query($sql, $con))
{
	die('Error: '.mysql_error());
}

mysql_close($con);
?>

<?php

//insert new incident
if(isset($_POST["btnSubmit"]))
{
	//connect to database
	$con = mysql_connect("localhost", "audrey", "T0126841JAUDREy");
	if(!$con)
	{
	die("Cannot connect to database:".mysql_error());
	}
	
	mysql_select_db("pess_audrey", $con);
	
//update patrolcar status table and dispatch table
$patrolcarDispatched = $_POST["chkPatrolcar"];

$c = count($patrolcarDispatched);

$status;
if($c > 0)
	{
	$status = '2';
	}
	else{
		$status = '1';
		}
		
$sql = "INSERT INTO incident(callerName, phoneNumber, incidentTypeID, incidentLocation, incidentDesc, incidentStatusID) VALUES('".$_POST['callerName']."','".$_POST['ccntactNumber']."','".$_POST['incidenttype']."','".$_POST['location']."','".$_POST['incidentDesc']."','$status')";

if(!mysql_query($sql, $con))
{
	die('Error1:' .mysql_error());
}
//retrieve new incremental key for incidentId
$incidentId = mysql_insert_id($con);;

for($i=0; $i<$c; $i++)
{
	$sql = "UPDATE patrolcar SET patrolcarStatusID='1' WHERE patrolCarID='$patrolcarDispatched[$i]'";
	//echo $sql;
	if(!mysql_query($sql, $con))
	{
		die('Error2:' .mysql_error());
	}
	
	$sql = "INSERT INTO dispatch(incidentID, patrolCarID, timeDispatched) VALUES('$incidentId', '$patrolcarDispatched[$i]',NOW())";
	
	if(!mysql_query($sql, $con))
	{
		die('Error3:' .mysql_error());
	}
}
mysql_close($con);
}
?>

	<form name="frmlogcall" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<table>
		<tr>
			<td>Caller's name:</td>
			<td>
				<?php echo $_POST['callerName']; ?>
				<input type="hidden" name="callerName" value="<?php echo $_POST['callerName']; ?>" />
			</td>
		</tr>
		
		<tr>
			<td>Contact Number:</td>
			<td>
				<?php echo $_POST['ccntactNumber']; ?>
				<input type="hidden" name="ccntactNumber" value="<?php echo $_POST['ccntactNumber']; ?>" />
			</td>
		</tr>
		
		<tr>
			<td>Location:</td>
			<td>
				<?php echo $_POST['location']; ?>
				<input type="hidden" name="location" value="<?php echo $_POST['location']; ?>" />
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td>
				<?php echo $_POST['incidenttype']; ?>
				<input type="hidden" name="incidenttype" value="<?php echo $_POST['incidenttype']; ?>" />
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<?php echo $_POST['incidentDesc']; ?>
				<input type="hidden" name="incidentDesc" value="<?php echo $_POST['incidentDesc']; ?>" />
			</td>
		</tr>
</table>

<table width="40%" border="1" align="center" cellpadding="4" cellspacing="8">
	<tr>
		<td width="20%">&nbsp;</td>
		<td width="51%">Patrol Car ID</td>
		<td width="29%">Status</td>
	</tr>
	
<?php
$i = 0;
while($i < $count){
?>
<tr>
	<td class="td_label"><input type="checkbox" name="chkPatrolcar[]" value="<?php echo $patrolcarArray[$i]['patrolCarID']?>"></td>
	<td><?php echo $patrolcarArray[$i]['patrolCarID']?></td>
	<td><?php echo $patrolcarArray[$i]['statusDesc']?></td>
</tr>

<?php $i++;
}	?>

</table>

<table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
	<tr>
	<td width="46%" class="td_label"><input type="reset" name="btnCancel" id="btnCancel" value="Reset"></td>
	<td width="54%" class="td_Data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit"></td>
	</tr>
</table>
	</form>
</body>
</html>