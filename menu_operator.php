 <?php if (!isset($operator)) {
   $operator=$_SESSION['operator_username'];
 } ?>
 <aside class="main-sidebar">
    <section class="sidebar">
      <!-- search form -->
      
         <script type="text/javascript">
$(document).ready(function(){

        
       
    
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        resultDropdown = $(this).siblings(".result");
        if(term.length){

            $.get("fetch_operator.php", {query: term}).done(function(data){
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


    <div class="search-box sidebar-form" >
    

        <input type="text" autocomplete="off" id="sf" class="btnf form-control"  style="text-color: white" onblur="setTimeout(function() { if (typeof resultDropdown !== 'undefined') {
    // the variable is defined
resultDropdown.empty();} }, 110);; " placeholder="Search client.." ></input>


        <div class="result"></div>
    </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><center>Operator</center></li>

        <li class=" treeview <?php echo " ".$ac0." "; ?>" >
          <a href="operator.php?pager=home">
            <i class="fa fa-dashboard"></i> <span>All<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          
          </a>
        </li>
        
        <li class=" treeview <?php echo " ".$ac11." "; ?>">
          <a href="operator.php?pager=web">
            <i class="fa fa fa-magnet"></i> <span>Web<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM user WHERE web=0 AND sendto='".$_SESSION['operator_username']."' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>     

        <li class="treeview <?php echo " ".$ac1." "; ?>">
          <a href="operator.php?pager=potential">
            <i class="fa fa-hand-o-right"></i> <span>Potential<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Potential' ") or die(mysqli_connect_errno());
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>


        <li class="treeview <?php echo " ".$ac2." "; ?>">
          <a href="operator.php?pager=followup">
            <i class="fa fa-thumbs-up"></i> <span>Follow Up<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Follow Up' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>

        <li class="treeview <?php echo " ".$ac3." "; ?>">
          <a href="operator.php?pager=interested">
            <i class="fa fa-lightbulb-o"></i> <span>Interested<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Interested' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>

        <li class=" treeview <?php echo " ".$ac4." "; ?>">
          <a href="operator.php?pager=noninterested">
            <i class="fa fa-exclamation"></i> <span>Not Interested<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Non Interested' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>

        <li class=" treeview <?php echo " ".$ac5." "; ?>">
          <a href="operator.php?pager=nonanswer">
            <i class="fa fa-retweet"></i> <span>No Answer<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Non Answer' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo htmlentities($ptotal);?>
                      </span></span>
          </a>
        </li>

        <li class=" treeview <?php echo " ".$ac6." "; ?>">
          <a href="operator.php?pager=callfailed">
            <i class="fa fa-tty"></i> <span>Call Failed<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Call Failed' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>
        <li class=" treeview <?php echo " ".$ac7." "; ?>">
          <a href="operator.php?pager=secretary">
            <i class="fa fa-comment-o"></i> <span>Secretary<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Secretary' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>

        <li class=" treeview <?php echo " ".$ac8." "; ?>">
          <a href="operator.php?pager=new">
            <i class="fa fa-plus"></i> <span>New<span class="badge" style="right:5px;position: absolute;">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='New' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></span>
          </a>
        </li>

        <li class=" treeview <?php echo " ".$ac9." "; ?>">
          <a href="operator.php?pager=latest">
            <i class="fa fa-clock-o "></i> <span>Latest</span>
          </a>
        </li>

        <li class=" treeview <?php echo " ".$ac10." "; ?>">
          <a href="operator.php?pager=statistics">
            <i class="fa fa-bar-chart"></i> <span>Statistics</span>
          </a>
        </li>




       

        
            </li>
            
          </ul>
        </li>
      </ul>
    </section>
  </aside>