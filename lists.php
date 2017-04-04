<?php 
include_once 'include/header.php';
    if (isset($_SESSION['login_username'])) { 
    $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];
      
    $result=mysqli_query($con,"SELECT DISTINCT name FROM list_names ");
?>
 <div class="container-fluid" id="home">
      <div class="row admin-outer">
<ul class="nav nav-tabs nav-justified" style=" width: 1px;">
  <li role="presentation"  ><a style="color: #05147e;font-weight: bold;float: left;"  href="admin.php?pager=home">Trader</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=sec">Finish</a></li>
    <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=ftd">FTD</a></li>
    <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=op_leads">Op.Leads</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left" href="admin_meet.php">Meeting</a></li>
      <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=operator">Reg.Operators</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="list_operator.php">Operators</a></li>
  <li role="presentation" class="active"><a style="color: #05147e;font-weight: bold;float: left;" href="lists.php">Lists</a></li>
</ul>
<center>
<div style="margin-right: 12px;">


          <table  style="background:url('/images/2.png');  margin-bottom: 0px !important;  background-repeat: round;" id="etab1" class="table  table-condensed " cellspacing="0" width="100%" height='83px'>
          <tr >
          <th ><center>
 <div class=" badge" data-count=
<?php

if (isset($_SESSION['login_username'])) {
 $result2=$get_total;
$data=mysqli_fetch_assoc($result2);
?> > <?php echo $data['total'];}?>
</div>


 </div>
 </center>

<td >


<script type="text/javascript">
$(document).ready(function(){

        
       
    
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        resultDropdown = $(this).siblings(".result");
        if(term.length){

            $.get("fetch.php", {query: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
        // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});

</script>


    <div class="search-box ">
        <input type="text" autocomplete="off" id="sf" class="btnf"  onblur="setTimeout(function() { if (typeof resultDropdown !== 'undefined') {
    // the variable is defined
resultDropdown.empty();} }, 110);; " placeholder="Search client.." />
        <div class="result"></div>
    </div>


            <a href="export.php?export=all" class='btn btn-default btnf'>Download all</a>

            <a href="export.php?export=new" class='btn btn-default btnf'>Download Newest</a>

             <a href="manual_registration.php" class="btn btn-default btnf">Create New</a>
            </td>

            <td  ><center>
              <div class="btn-group">



    </div>


    </center>

            </td>


          </th>

          </tr>
</table>



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

              <td><a href="view_list.php?list_name=<?php echo $row['name']; ?>"> <?php echo $row['name']; ?> </a></td>
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