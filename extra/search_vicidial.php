<?php
include("../db_connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>

input[type=text] {
    width: 130px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
}

#custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
    }
 
    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-input button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }

</style>
<body>
<div class="container" style="margin-left: -0px;padding-bottom: 20px;">
	<form form class="form-wrapper cf" class="form-group" action="" method="POST">
	<center><h3>Search Database</h3></center>
		<center><table>
			<tr>
				<td><input  placeholder="Search here..." required type="text" name="name" size="30"></td>
				<td><input class="btn btn-primary" type="submit" name="submit"></td>
			</tr>
		</table></center>
	</form>
</div>

<div>

 <?php
 if($_REQUEST['submit']){
	$name = $_POST['name'];
	
	$sql_query="SELECT * FROM vicidial_list WHERE  (first_name LIKE '" . $name . "%' OR last_name LIKE '" . $name . "%' OR phone_number LIKE '".$name."') LIMIT 10 ";
	$result=mysqli_query($dbconfig,$sql_query);
	echo '<table class="table table-striped table-bordered table-hover">'; 
  echo"<TR><TD>LeadID</TD><TD>First Name</TD><TD>Last Name</TD><TD>User</TD></TR>";
while($row = mysqli_fetch_array($result))
{
  echo "<tr><td>"; 
  echo $row['lead_id'];
  echo "</td><td>";   
  echo $row['first_name'];
  echo "</td><td>";    
  echo $row['last_name'];
  echo "</TD><td>";    
  echo $row['user'];
  echo "</TD></tr>";  
}
 }
	

echo "</table>";
 
?>
</div>


</body>
</html>

