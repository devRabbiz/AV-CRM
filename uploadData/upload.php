
<?php  

include_once '../db_connect.php';
require_once '../session.php';
$list_name=$_POST['list_name'];

if (!empty($_FILES[csv][tmp_name])) {
 $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];


if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 

    do { 

         
          $q=mysqli_query($con,"SELECT count(*) as total1 FROM user WHERE phone_no ='39".$data[2]."'  ");
           $data1=mysqli_fetch_assoc($q);      
                  

            $q2=mysqli_query($con,"SELECT count(*) as total2 FROM list_names WHERE name='".$list_name."' " );
            $data2=mysqli_fetch_assoc($q2); 
            
            if($data2['total2']==0) {
                    mysqli_query($con,"REPLACE INTO list_names(name) VALUES('".$list_name."') ");
            }          
                    
        if ($data[0]) {
         
          if($data1['total1']==0) {
         
            
        
            mysqli_query($con,"REPLACE INTO user (name, email, phone_no, alt_phone,reg_by, lang, list_name) VALUES 
                ( 
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."', 
                    '39".addslashes($data[2])."',
                    '".addslashes($data[3])."',
                    'list',
                    '".$lang."',
                    '".$list_name."'
                )
            ");
         }
     }
   
    } while ($data = fgetcsv($handle,1000000,",","'")); 
    // 

    //redirect 
    header('Location: ../admin.php?success=1'); die; 

} 
} else {
    header('Location: ../admin.php?fail=1'); die; 

}

?> 