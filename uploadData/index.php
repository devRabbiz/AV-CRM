


<?php if (!empty($_GET['success'])|| isset($_GET['success'])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="upload.Data/upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

