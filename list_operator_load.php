<?php 

    if (isset($_SESSION['login_username'])) { 
    $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];
      
    $result=mysqli_query($con,"SELECT * FROM operator WHERE lang='".$lang."' ");
?>
 

<table id="tabb" class="table table-striped table-hover" style="width: 100%;margin-bottom: 0px" data-sort="table">
      <thead> 
      	<tr>
      		<th>Operator:</th>
          <th>Total </th>
          <th>Potential</th>
          <th>Follow Up</th>
          <th>Interested</th>
          <th>Non Interested</th>

          <th>Non Answer</th>
          <th>Call Failed</th>
          <th>Secretary</th>
          <th>Web</th>
          <th>New</th>
          <th>Deposit</th>
      	</tr>
      </thead>
      <tbody>
      <?php 

      while($row = $result->fetch_assoc()){ ?>

      	<tr>

      		<td><a href="<?php echo $_SERVER['PHP_SELF']?>?pager=view_operator&op_name=<?php echo $row['username'] ?>"><?php echo $row['full_name']; ?></a></td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='Potential' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>

              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='Follow Up' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='Interested' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='Non Interested' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='Non Answer' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='Call Failed' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='Secretary' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>

              <td> <?php $stat=mysqli_query($con,"SELECT *,user.id,user.web FROM jobs,user WHERE jobs.operator='".$row['username']."' AND user.web=0 AND user.id=jobs.id ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>

              <td> <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$row['username']."' AND status='New' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
              <td> <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE deposit_by='".$row['username']."' ");
                 $ptotal=mysqli_num_rows($stat);
                 echo $ptotal;?>
              </td>
      	</tr>
      <?php } ?>
      </tbody>



</table>



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
<style type="text/css">
  .wrapper{
    overflow-y: hidden !important;
  }
</style>






<?php } ?>