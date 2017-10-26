<?php 


    if (isset($_SESSION['login_username'])) { 
    $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];
      
    $result=mysqli_query($con,"SELECT * FROM list_names where lang='".$lang."' ");
    $ac12='active';
?>




    <div class="well col-md-12">
    <?php 
    if (mysqli_num_rows($result)==0){

        echo "<div class='well col-md-12'><p class='text-center'>No List</p><ul class='pager'><li>";
        echo '<a href="admin.php?upload=list">Upload new</a></li></ul></div>';

      } else { ?>

<table id="tabb" class="table table-condensed table-hover table-bordered"  data-sort="table">
      <thead>
        <tr>
          <th>List Name</th>
          <th>Total </th>
          <th>Potential</th>
          <th>Follow Up</th>
          <th>Interested</th>
          <th>Non Interested</th>
          <th>Non Answer</th>
          <th>Call Failed</th>
          <th>Secretary</th>
          <th>Deposit</th>
          <th>Sent</th>
          <th>Not Sent</th>
          <th>UnUsed</th>
        </tr>
      </thead>
      <tbody>
      <?php 

      while($row = $result->fetch_assoc()){ ?>

        <tr>

              <td><a href="<?php echo $_SERVER['PHP_SELF']?>?pager=view_list&list_name=<?php echo $row['name']; ?>"> <?php echo $row['name']; ?> </a></td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='Potential' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>

              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='Follow Up' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='Interested' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='Non Interested' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='Non Answer' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='Call Failed' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='Secretary' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND deposit_by!='' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND sendto IS NOT NULL ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND sendto IS NULL ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$row['name']."' AND op_status='' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
        </tr>
      <?php } ?>
      </tbody>



</table>
  <?php  } ?>

</center>

<script type="text/javascript">
  $(document).ready(init);

function init(jQuery) {
  CurrentYear();
  
  initTableSorter();
}

function CurrentYear() {
  var thisYear = new Date().getFullYear()
  $("#currentYear").text(thisYear);
}


// Table Sorter
//$(document).ready(initTableSorter);
  
function initTableSorter() {
  // call the tablesorter plugin
  $("[data-sort=table]").tablesorter({
    // Sort on the second column, in ascending order
    sortList: [[0,0]]
  });
}

</script>













</center>











</div>




</div>

</div></div>



<?php } ?>