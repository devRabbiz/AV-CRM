<?php 
include_once 'include/header.php';
    if (isset($_SESSION['login_username'])) { 
    $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];
      
    $result=mysqli_query($con,"SELECT * FROM operator WHERE lang='".$lang."' ");
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
  <li role="presentation" class="active"><a style="color: #05147e;font-weight: bold;float: left;" href="list_operator.php">Operators</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="lists.php">Lists</a></li>
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
<table id="tabb" class="table table-condensed table-hover table-bordered" style="width: 70%" data-sort="table">
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
          <th>New</th>
          <th>Deposit</th>
      	</tr>
      </thead>
      <tbody>
      <?php 

      while($row = $result->fetch_assoc()){ ?>

      	<tr>

      		<td><a href="view_operator.php?op_name=<?php echo $row['username'] ?>"><?php echo $row['full_name']; ?></a></td>
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















</div>




</div>

</div></div>



<?php } ?>