<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>

<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Today Stats</h3>
</div>
  <div class="panel-body">
    <div id="today" style="height: 250px;"></div>
  </div>
</div>
</br>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">All time Stats</h3>
</div>
  <div class="panel-body">
    <div id="alltime" style="height: 250px;"></div>
  </div>
</div>

<script type="text/javascript">
//sort array 
function sortby(prop){
   return function(a,b){
      if( a[prop] < b[prop]){
          return 1;
      }else if( a[prop] > b[prop] ){
          return -1;
      }
      return 0;
   }
}
function updateLiveToday(mainGraph) {
    // Make our API call again, requesting fresh data
    $.getJSON('/charts/chart_data_today.php', function(data) {
        // Set the already-initialised graph to use this new data
        data=data.sort(sortby('calls'));
        todaymor.setData(data);
    });
}
  $(function() {
    $.ajax({

        url: '/charts/chart_data_today.php',
        type: 'GET',
        success: function(data) {
            
            data=data.sort(sortby('calls'));

           todaymor= Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'today',
    
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data:data,
  // The name of the data record attribute that contains x-values.
  xkey: 'name',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['calls'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['calls'],
  barColors: ['#1fbba6', '#f8aa33', '#4da74d', '#afd8f8', '#edc240', '#cb4b4b', '#9440ed'],
  barOpacity: 0.5,
  resize: true,
  gridTextColor: '#666',
  grid: false
});
            setInterval(function() {
            updateLiveToday(todaymor);
        }, 2000);

            
 }
    });
});
</script>

<script type="text/javascript">
//sort array 
function sortby(prop){
   return function(a,b){
      if( a[prop] < b[prop]){
          return 1;
      }else if( a[prop] > b[prop] ){
          return -1;
      }
      return 0;
   }
}
function updateLiveAlltime(mainGraph) {
    // Make our API call again, requesting fresh data
    $.getJSON('/charts/chart_data_alltime.php', function(data) {
        // Set the already-initialised graph to use this new data
        data=data.sort(sortby('calls'));
        mainGraph.setData(data);
    });
}

  $(function() {
  
   $.ajax({

        url: '/charts/chart_data_alltime.php',
        type: 'GET',
        success: function(data) {

            data=data.sort(sortby('calls'));

            alltimemor=Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'alltime',
    
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data:data,
  // The name of the data record attribute that contains x-values.
  xkey: 'name',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['calls'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['calls'],
  barColors: ['#1fbba6', '#f8aa33', '#4da74d', '#afd8f8', '#edc240', '#cb4b4b', '#9440ed'],
  barOpacity: 0.5,
  resize: true,
  gridTextColor: '#666',
  grid: false
});
setInterval(function() {
            updateLiveAlltime(alltimemor);
        }, 2000);


            
 }
    });

});

</script>
  
</body>
</html>
