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


    <div class="search-box sidebar-form" >
    

        <input type="text" autocomplete="off" id="sf" class="btnf form-control"  style="text-color: white" onblur="setTimeout(function() { if (typeof resultDropdown !== 'undefined') {
    // the variable is defined
resultDropdown.empty();} }, 110);; " placeholder="Search client.." ></input>


        <div class="result"></div>
    </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class=" treeview <?php echo $h ?>" >
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=home'?>">
            <i class="fa fa-dashboard"></i> <span>Trader</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="manual_registration.php"><i class="fa fa-user-plus"></i>Create New</a></li>
            
          </ul>
        </li>

        <li class="treeview <?php echo $s ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=sec'?>">
            <i class="fa fa-check"></i> <span>Finish</span>
          </a>
        </li>

        <li class="treeview <?php echo $f ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=ftd'?>">
            <i class="fa fa-thumbs-up"></i> <span>FTD</span>
          </a>
        </li>

        <li class="treeview <?php echo $l ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=op_leads'?>">
            <i class="fa fa-dashboard"></i> <span>Op_leads</span>
          </a>
        </li>

        <li class=" treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=meeting'?>">
            <i class="fa fa-calendar"></i> <span>Meeting</span>
          </a>
        </li>

        <li class=" treeview  <?php echo $o ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=operator'?>">
            <i class="fa fa-dashboard"></i> <span>Reg.Operator</span>
          </a>
        </li>

        <li class=" treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=list_operator'?>">
            <i class="fa fa-users"></i> <span>Operator</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Lists</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php  ?>
          <ul class="treeview-menu">
            <li><a href="#" data-toggle="modal" data-target="#uploadmodal"><i class="fa fa-list"></i>Create New</a></li>
            
              <?php 
                  $res=mysqli_query($con,"SELECT DISTINCT name FROM list_names ") or die("error");
                   if (mysqli_num_rows($res)==0){

        echo "No Lists";


      } else {

      while($rowr = $res->fetch_assoc()){ ?>
            
                <li><a href="view_list.php?list_name=<?php echo $rowr['name']; ?>"><i class="fa fa-list-alt"></i> <?php echo $rowr['name']; ?></a></li>

              <?php } } ?>
               <li><a href="lists.php"><i class="fa  fa-table"></i>View Details</a></li>
           
          </ul>
        </li>

        
            </li>
            
          </ul>
        </li>
      </ul>
    </section>
  </aside>