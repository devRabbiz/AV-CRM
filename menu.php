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
        <li class="header">
          
      <ol class="breadcrumb" style="margin:0px">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">
          <?php 
              switch ($pager) {
                case 'all':
                  echo "All";
                break;
                case 'home':
                  echo "Trader";
                break;
                case 'sec':
                  echo "Finish";
                break;
                case 'ftd':
                  echo "FTD";
                break;
                case 'web':
                  echo "WEB";
                break;
                case 'callback':
                  echo "Callback";
                break;
                case 'op_leads':
                  echo "Operator Leads";
                break;
                case 'meeting':
                  echo "Meeting";
                break;
                case 'operator':
                  echo "Reg by Operators";
                break;
                case 'list_operator':
                  echo "Operator List";
                break;
                case 'potential':
                  echo "Status  /  Potential";
                break;
                case 'follow_up':
                  echo "Status  /  Follow Up";
                break;
                case 'interested':
                  echo "Status  /  Interested";
                break;
                case 'not_interested':
                  echo "Status  /  Not Interested";
                break;
                case 'no_answer':
                  echo "Status  /  No Answer";
                break;
                case 'call_failed':
                  echo "Status  /  Call Failed";
                break;
                case 'secretary':
                  echo "Status  /  Secretary";
                break;
                case 'no_status':
                  echo "Status /  No Status";
                break;
                default:
                  # code...
                break;
              }
           ?>
        </li>
      </ol>

        </li>

        <li class="treeview <?php echo " ".$ac8." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=all'?>">
            <i class="fa fa-globe"></i> <span>All</span>
          </a>
        </li>

        <li class="treeview <?php echo " ".$ac1." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=home'?>">
            <i class="fa fa-user"></i> <span>Trader</span>
          </a>
        </li>

        <li class="treeview <?php echo " ".$ac2." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=sec'?>">
            <i class="fa fa-check"></i> <span>Finish</span>
          </a>
        </li>

        <li class="treeview <?php echo " ".$ac3." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=ftd'?>">
            <i class="fa fa-thumbs-up"></i> <span>FTD</span>
          </a>
        </li>

        <li class="treeview <?php echo " ".$ac11." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=web'?>">
            <i class="fa fa-magnet"></i> <span>Web</span>
          </a>
        </li>

         <li class="treeview <?php echo " ".$ac6." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=callback'?>">
            <i class="fa fa-exchange"></i> <span>Callback</span>
          </a>
        </li>




           <li class=" treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Operator Status</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

        <li class="treeview <?php echo " ".$ac1." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=potential">
  '?>          <i class="fa fa-hand-o-right"></i> <span>Potential</span>
          </a>
        </li>


        <li class="treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=follow_up">
  '?>          <i class="fa fa-thumbs-up"></i> <span>Follow Up</span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=interested">
 '?>           <i class="fa fa-lightbulb-o"></i> <span>Interested</span>
          </a>
        </li>

        <li class=" treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=not_interested'?>">
            <i class="fa fa-exclamation"></i> <span>Not Interested</span>
          </a>
        </li>

        <li class=" treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=no_answer">
  '?>          <i class="fa fa-retweet"></i> <span>No Answer</span>
          </a>
        </li>

        <li class=" treeview ">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=call_failed">
'?>            <i class="fa fa-tty"></i> <span>Call Failed</span>
          </a>
        </li>
        <li class=" treeview ">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=secretary">
  '?>          <i class="fa fa-comment-o"></i> <span>Secretary</span>
          </a>
        </li>
        <li class=" treeview ">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=no_status">
  '?>          <i class="fa fa-times"></i> <span>No Status</span>
          </a>
        </li>

 


 


          </ul>
        </li>


        <li class="treeview <?php echo " ".$ac5." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=op_leads'?>">
            <i class="fa fa-dashboard"></i> <span>Op_leads</span>
          </a>
        </li>

        <li class=" treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=meeting'?>">
            <i class="fa fa-calendar"></i> <span>Meeting</span>
          </a>
        </li>

        <li class=" treeview  <?php echo " ".$ac4." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=operator'?>">
            <i class="fa fa-dashboard"></i> <span>Reg.Operator</span>
          </a>
        </li>

        <li class=" treeview">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=list_operator'?>">
            <i class="fa fa-users"></i> <span>Operators</span>
          </a>
        </li>
        <?php if (!isset($_GET['list_name'])): ?>
          
        <li class=" treeview <?php echo " ".$ac12." "; ?>">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?pager=lists'?>">
            <i class="fa fa-list"></i> <span>Lists</span>
          </a>
        </li>
        <?php endif ?>
        <?php if (isset($_GET['list_name'])): ?>
          
            <li class=" treeview <?php echo " ".$ac12." "; ?>" >
            <a href="#" onclick="window.location.href='?pager=lists'">
              <i class="fa fa-dashboard"></i> <span>Lista</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

          <li class=" treeview <?php echo " ".$ac12." "; ?>">
            <a >
              <i class="fa fa-list"></i> <span><?php echo $_GET['list_name']; ?></span>
            </a>
                </li>


            </ul>
        </li>
         <?php endif ?>
        
            </li>
            
          </ul>
        </li>
      </ul>
    </section>
  </aside>
