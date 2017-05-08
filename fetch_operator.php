<?php
include_once 'db_connect.php';
include_once 'session.php';
$link = $con;
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$query = mysqli_real_escape_string($link, $_REQUEST['query']);
 
if(isset($query)){
    // Attempt select query execution

    $sql = "SELECT * FROM user WHERE  (reg_by='".$_SESSION['operator_username']."' OR sendto='".$_SESSION['operator_username']."') AND (name LIKE '" . $query . "%' OR email LIKE '" . $query . "%' OR phone_no LIKE '".$query."') LIMIT 10 ";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<a href='operator_view_user.php?user_id=";
                echo $row['id'];
                echo "'><div style='height:10px;width:100%;margin:10px'>" . $row['name'] . "</div></a><hr>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p><center>No client found!</center></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// close connection
mysqli_close($link);
?>