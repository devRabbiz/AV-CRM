<?php
include("../db_connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRM</title>
  <meta charset="utf-8">
    <script type="text/javascript" src="../dist/js/jquery-3.1.1.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.css">
  <link rel="stylesheet" href="../dist/css/bootstrap-datetimepicker.min.css" />


 
  <script src="../dist/js/moment.js"></script>
  <script src="../dist/js/clipboard.min.js"></script>
  <script type="text/javascript" src="../dist/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="../dist/js/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../dist/js/jquery.slimscroll.min.js"></script>
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../dist/css/bootstrapPlusPlus.css" />
     

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
<div class="container" >
	<form form class="form-wrapper cf" class="form-group" action="" method="POST">
	<center>
    <h3>Search Vicidial Database</h3>
        <div class="input-group">
				<input class="form-control" style="text-align: center;font-size: 16px;float: left;width: 70%" <?php if (isset($_POST['name'])): ?>
          value="<?php echo $_POST['name'] ?>"
        <?php endif ?>  placeholder="Search here..." required type="text" name="name" size="30">
				<input style="float: left;width: 30%"  class="btn btn-primary" type="submit" name="submit">
        </div>
		</center>
	</form>
</div>

<div>
<br>
 <?php
 if($_REQUEST['submit']){
	$name = $_POST['name'];
  $name_ = $_POST['name'];
  $name=explode(' ',$_POST['name']);
  $first_name=$name[0];
  $last_name=$name[1];
  $len=sizeof($name);
  if ($len==1) {
    $sql_query="SELECT * FROM vicidial_list WHERE  (first_name LIKE '" . $name_ . "%' OR last_name LIKE '" . $name_ . "%' OR phone_number LIKE '".$name_."') LIMIT 20 ";
  }
  if ($len==2) {

    $sql_query="SELECT * FROM vicidial_list WHERE  (first_name LIKE '" . $first_name . "%' AND last_name LIKE '" . $last_name . "%' ) LIMIT 20 ";
  }
	

	$result=mysqli_query($dbconfig,$sql_query);
	echo '<table class="table table-striped table-bordered table-hover">'; 

  echo"<TR>
      <TD style='width:1px;'>LeadID</TD>
      <TD >First Name</TD>
      <TD>Last Name</TD>
      <td>Phone Number</td>
      <TD>User</TD>
    </TR>";
while($row = mysqli_fetch_array($result))
{
  echo "<tr><td>"; 
  echo $row['lead_id'];
  echo "</td><td>";   
  echo $row['first_name'];
  echo "</td><td>";    
  echo $row['last_name'];
  echo "</TD><td>";    
  echo $row['phone_number'];
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

