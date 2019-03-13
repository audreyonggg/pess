<?php
if(isset($_POST["btnUpdate"])){
	
	//retrieve patrol car status and patrolcarstatus
	//connect to a database
	$con = mysql_connect("localhost", "audrey", "T0126841JAUDREy");
	if(!$con)
	{
	die("Cannot connect to database:".mysql_error());
	}
	
	//select a table in the database
	mysql_select_db("pess_audrey", $con);
	
	//update patrol car status
	$sql = "UPDATE patrolcar SET patrolcarStatusID = '".$_POST["patrolCarStatus"]."' WHERE patrolCarID = '".$_POST["patrolCarID"]."'";
	
	if(!mysql_query($sql, $con))
	{
		die('Error4:' .mysql_error());
	}
	
	//if patrol car status is on-site(4) then capture the time of arrival
	if($_POST["patrolCarStatus"] == '4'){
		
		$sql = "UPDATE dispatch SET timeArrived=NOW() WHERE timeArrived is NULL AND patrolCarID = '".$_POST["patrolCarStatus"]."'";
		if(!mysql_query($sql, $con))
	{
		die('Error4:' .mysql_error());
	}
	
	}else if($_POST["patrolCarStatus"] == '3'){ //else if patrol car status is FREE then capture the time of completion
	
	//First, retrieve the incident ID from dispatch table handled by that patrol car
	$sql = "SELECT incidentID FROM dispatch WHERE timeCompleted is NULL AND patrolCarID = '".$_POST["patrolCarID"]."'";
	
	$result = mysql_query($sql, $con);
	$incidentId;
	
	while($row = mysql_fetch_array($result))
	{
		//patrolCarID, patrolcarStatusID
		$incidentId = $row['incidentId'];
	}
	
	//echo $incidentId;
	
	//Now then can update dispatch
	$sql = "UPDATE dispatch SET timeCompleted=NOW() WHERE timeCompleted is NULL AND patrolCarID = '".$_POST["patrolCarID"]."'";
	
	if(!mysql_query($sql, $con))
	{
		die('Error4:' .mysql_error());
	}
	
	//Last ut not least, update incident in incident table to completed (3) all all patrol car attended to it are FREE now
	$sql = "UPDATE incident SET incidentStatusID = '3' WHERE incidentID = '$incidentId' AND incidentID NOT IN(SELECT incidentID FROM dispatch WHERE timeCompleted IS NULL)";
	
	if(!mysql_query($sql, $con))
	{
		die('Error5:' .mysql_error());
	}
}

mysql_close($con);
?>

<script type = "text/javascript">//window.location="./logcall.php";</script>
<?php }?>

<!DOCTYPE HTML>
<html>
<head>
<title>Update</title>
</head>

<body>
<?php
include 'project.php';
?>

<?php
if(!isset($_POST["btnSearch"])){
?>

<!-- reate a form to search for patrol car based on id -->
<form name="form1" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
		<fieldset>
			<legend>Update Patrol Car</legend>

<table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
<tr>
	<td width="25%" class="td_label">Patrol Car ID:</td>
	<td width="25%" class="td_Data"><input type="text" name="patrolCarID" id="patrolCarID"></td>
	
	<!-- must validate for no empty entry at the Client side, HOW??? -->
	<td class="td_Data"><input type="submit" name="btnSearch" id="btnSearch" value="Search"></td>
</tr>
</table>
		</fieldset>
</form>
<?php
} else {
	//echo $_POST["patrolCarID"];
	//retrieve patrol car status and patrolcarstatus
	//connect to a database
	$con = mysql_connect("localhost", "audrey", "T0126841JAUDREy");
	if(!$con)
	{
	die("Cannot connect to database:".mysql_error());
	}
	
	//select a table in the database
	mysql_select_db("pess_audrey", $con);
	//retrieve patrol car status
	$sql = "SELECT * FROM patrolcar WHERE patrolCarID = '".$_POST['patrolCarID']."'";
	
	$result = mysql_query($sql, $con);
	$patrolCarID;
	$patrolcarStatusID;
	
	while($row = mysql_fetch_array($result))
	{
		//patrolCarID, patrolcarStatusID
		
		$patrolCarID = $row['patrolCarID'];
		$patrolcarStatusID = $row['patrolcarStatusID'];
	}
	
	//retrieve patrolcarstatus master table
	$sql = "SELECT * FROM patrolcar_status";
	
	$result = mysql_query($sql, $con);
	$patrolCarStatusMaster;
	
	while($row = mysql_fetch_array($result))
	{
		//statusID, statusDesc
		//create an associative array of patrol car status master type
		
		$patrolCarStatusMaster[$row['statusID']]=$row['statusDesc'];
	}
	mysql_close($con);
?>

<!-- display a form to update patrol car status
also update incident status when patrol car status is FREE -->
<form name="form2" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
		<fieldset>
			<legend>Update Patrol Car</legend>
			
<table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
<tr>
	<td width="25%" class="td_label">Patrol Car ID:</td>
	<td width="25%" class="td_Data"><?php echo $_POST["patrolCarID"]?></td><input type="hidden" name="patrolCarID" id="patrolCarID" value="<?php echo $_POST["patrolCarID"]?>">
</tr>
	
<tr>
	<td class="td_label">Status:</td>
	<td class="td_Data"><select name="patrolCarStatus" id="$patrolCarStatus">
	
	<?php foreach($patrolCarStatusMaster as $key => $value){?>
		<option value="<?php echo $key ?>"
		<?php if($key == $patrolcarStatusID){?> selected="selected"
		<?php }?>>
		<?php echo $value ?>
		</option>
		
	<?php }?>
	</select></td>
</tr>
</table>
<br/>

<table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
<tr>
	<td width="46%" class="td_label"><input type="reset" name="btnCancel" id="btnCancel" value="Reset"></td>
	
	<td width="54%" class="td_Data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnUpdate" id="btnUpdate" value="Update">
	</td>
</tr>
</table>
		</fieldset>
</form>
<?php }?>
</body>
</html>