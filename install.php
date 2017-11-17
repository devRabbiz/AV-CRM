<head>
  <link href="dist/css/bootstrap.min.css" rel="stylesheet"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style type="text/css">
    body , .well{
    background: #11998e;
    background: -webkit-linear-gradient(to left, #38ef7d, #11998e);
    background: linear-gradient(to left, #105d2d82, #11998e);
    }
    input {
      margin-top: 3px;
    }
  </style>
</head>

<div class="container" style="
    margin-top: 5%;">
<center class="well">
  <div class="panel  panel-warning">
      <div class="panel-heading">
        Requirements:
      </div>
    <table style="width: 100%" class=" table table-bordered">

      <tr >
        <td >
            PHP Version
        </td>
        <td>
           <?php if (phpversion() >= '5.4.20') {
                echo phpversion()." OK";
             } else{
              echo "Please update PHP to 5.4.20 or greater";
             }
             ?>
        </td>
      </tr>

      <tr >
        <td >
            error_reporting
        </td>
        <td>
             E_WARNING & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT
        </td>
      </tr>

      <tr>
        <td>
          display_errors
        </td>
        <td>
          Off
        </td>
      </tr>

  </table>
</div>
<div class="input-group col-md-6"> 

<div class="panel  panel-info">


  <div class="panel-heading">

<?php 
   
if (isset($_POST['submit'])) {
          $done=0;
           $dbhost = $_POST['host'];
           $dbuser = $_POST['mysql_username'];
           $dbpass = $_POST['mysql_password'];
           $admin  = $_POST['admin'];
           $password = $_POST['password'];

      if ($_POST['asterisk']=='on') {
          $txt =
              '<?php
               $con=mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
               //$conn= new mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
              $connectionN = new mysqli("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
              $bd=$con;
              $host = "'.$dbhost.'";
              $username = "'.$dbuser.'";
              $password = "'.$dbpass.'";
              $database = "asterisk";
              $dbconfig = mysqli_connect($host,$username,$password,$database);
               
              // Check connection
              if (mysqli_connect_error())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
              require_once "functions.php";

               ?>';
      } else {
          $txt =
                '<?php
                 $con=mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
                 //$conn= new mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
                $connectionN = new mysqli("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
                $bd=$con;
                $host = "'.$dbhost.'";
                $username = "'.$dbuser.'";
                $password = "'.$dbpass.'";
                $database = "asterisk";
                #$dbconfig = mysqli_connect($host,$username,$password,$database);
                 
                // Check connection
                if (mysqli_connect_error())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                require_once "functions.php";

                 ?>';

      }

            $file_db = fopen("db_connect.php", "w") or die("Unable to db file!<br><a href='install.php' class='btn btn-info'>Try Again</a>");
            if (fwrite($file_db, $txt)) {
              $done+=1;//  1
              echo "Config file updated<br>";
            };
            fclose($file_db);
            
            // Create connection
            $conn = new mysqli($dbhost, $dbuser, $dbpass);
            // Check connection
            if ($conn->connect_error) {
                die("<a href='install.php' class='btn btn-info'>Try Again</a>");
            } 
              
            if ($_POST['create_db']=='on') {
             // Create database
            $sql = "CREATE DATABASE IF NOT EXISTS  `reg_db` ";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully</br>";
                $done+=1;// 2

                $query1 = file_get_contents("reg_db(structure).sql");

                /* execute multi query */
                  if ($conn->multi_query($query1)){
                       echo "DB Tables created successfully<br>";
                       $done+=1;// 3
                     }
                  else {
                       echo "<a href='install.php' class='btn btn-default'>Try Again</a>";
                  }

            } else {
                echo "Error creating database: </br>" . $conn->error;
                echo "<a href='install.php' class='btn btn-default'>Try Again</a>";
            }

                     $adm="INSERT INTO `admins` (`username`, `password`, `lang`, `full_name`, `session`, `table_limit`) VALUES ('".$admin."', '".$password."', 'it', 'Administrator', '', 30) "; $conn->close();    
                       $conn = new mysqli($dbhost, $dbuser, $dbpass,'reg_db');
                       if ($conn->query($adm)===TRUE) {
                         echo "Admin account created";
                         $done+=1;// 4
                       } else{
                          echo $conn->error;
                          echo "<a href='install.php' class='btn btn-default'>Try Again</a>";
                        }

            }


        if ($_POST['create_db']=='on' && $done==4) {
            sleep(1);
           // header("Location: index.php");
        }elseif (!$_POST['create_db']=='on' && $done==1) {
            sleep(1);
           // header("Location: index.php");
          }
        

} else{
  echo "Welcome";
}



?>
</div>
</div>

<form action="" method="POST">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Host" name="host" value="localhost">
    <input type="text" class="form-control" placeholder="DB username" name="mysql_username" value="root">
    <input type="text" class="form-control" placeholder="DB password" name="mysql_password">
      <input type="text" class="form-control" placeholder="Admin Username" name="admin" value="admin">
      <input type="text" class="form-control" placeholder="Admin Password" name="password">
    <label>
    <input type="checkbox" class="btn-default btn form-control" name="asterisk">Asterisk
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>
          <input type="checkbox" name="create_db" class="form-control btn btn-default">Create DB
    </label>
</div>
<br>
  
  <?php 

  if (isset($_POST['submit'])) {
    echo ' <a type="submit" style="float: right;" class="btn btn-success" href="index.php">Continue</a>';
    } else{
      echo '<button type="submit" style="float: right;" class="btn btn-success" name="submit">Install</button>';
    }
   ?>
</form>

</div>
  </center>
  </div>
 