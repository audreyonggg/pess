<!DOCTYPE HTML>
<html>
<head>
<title>Log Call</title>
<script>
function validateForm()
{
  var x = document.forms["frmlogcall"]["callerName"].value;
  if (x == "")
  {
    alert("Name must be filled out");
    return false;
  }
}
</script>
<?php // Audrey
if(isset($_POST['btnProcessCall']))
{
	$con = mysql_connect("localhost", "audrey", "T0126841JAUDREy");
	if(!$con)
	{
	die("Cannot connect to database:".mysql_error());
	}
	mysql_select_db("pess_audrey", $con);
	
	$sql = "INSERT INTO incident(callerName, phoneNumber, incidentTypeID, incidentLocation, incidentDesc, incidentStatusID) VALUES('$_POST[callerName]', '$_POST[ccntactNumber]', '$_POST[incidenttype]', '$_POST[location]', '$_POST[incidentDesc]', '1')";

//echo $sql;
	if(!mysql_query($sql, $con))
		die("Error: " . mysql_error());
	
	mysql_close($con);
}
?>

</head>
<body>
<?php
include 'project.php';
$con = mysql_connect("localhost", "audrey", "T0126841JAUDREy");
if(!$con)
	{
	die("Cannot connect to database:".mysql_error());
	}
mysql_select_db("pess_audrey", $con);
$result = mysql_query("SELECT * FROM incidenttype");
$incidenttype;
while($row = mysql_fetch_array($result))
{
	//incidenttypeID, incidenttypeDesc
	$incidenttype[$row['incidentTypeID']] = $row['incidentTypeDesc'];
}
mysql_close($con);
?>

	<form name="frmlogcall" method="POST" onsubmit="return validateForm" action="dispatch.php">
		<fieldset>
			<legend>Log Call</legend>
			<table>
				<tr>
					<td align="right">Caller's name:</td>
					<td><p><input type="text" name="callerName"/></p></td>
				</tr>
			
				<tr>
					<td align="right">Contact Number:</td>
					<td><p><input type="text" name="ccntactNumber"/></p></td>
				</tr>
			
				<tr>
					<td align="right">Location:</td>
					<td><p><input type="text" name="location"></p></td>
				</tr>
				
			<tr></tr>
			
				<tr>
				<td align="right" class="td_label">Incident Type:</td>
				<td class="td_date">

	<select name="incidenttype" id="incidenttype">
	<?php foreach ($incidenttype as $key => $value){?>
	<option value="<?php echo $key ?>"><?php echo $value ?></option>
	<?php }?>
	</select>
	
				</td>
				</tr>
				
			<tr>
			<td>Description:</td>
			<td><p><textarea name="incidentDesc" rows="5" cols="50"></textarea></p></td>
			</tr>
			<tr>
				<td align="right"><input type="reset"/></td>
				<td><input type="submit" name="btnProcessCall" value="Process Call"/></td>
			</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>