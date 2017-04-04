<?php
    $host="localhost";
    $username="root";
    $password="";
    $dbname="reg_db";
    $con = new mysqli($host, $username, $password,$dbname); 

      
{      if ($_GET['export']==='new') {
 

           $sql_data="SELECT name,email,phone_no FROM `user` WHERE `download` = 1 ORDER BY `date` ASC";
     
        $result_data=$con->query($sql_data);
        $results=array();
        if (mysqli_num_rows($result_data) > 0) {
       
        
    $filename = "newUsers.xls"; // File Name
    // Download file
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    while ($row = mysqli_fetch_assoc($result_data)) {
        if (!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        echo implode("\t", array_values($row)) . "\r\n";



    $sql = "UPDATE user SET download='0' WHERE download='1'";

if (mysqli_query($con, $sql)) {
    echo "";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
    }
}
else{
  echo "<script>

alert('No new data!');
window.location.href = 'admin.php';

</script>";

    
}


}
elseif ($_GET['export']=='all') {

     $sql_data="SELECT name,email,phone_no FROM `user`  ORDER BY `date` ASC";
     
        $result_data=$con->query($sql_data);
        $results=array();
    $filename = "allUsers.xls"; // File Name
    // Download file
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    while ($row = mysqli_fetch_assoc($result_data)) {
        if (!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        echo implode("\t", array_values($row)) . "\r\n";




}


}
}
   
 ?>