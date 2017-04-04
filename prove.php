<?php
$time=date('Y-m-d H:i:s');
$prove="2017-01-26 14:13:00";
;
?>



<script type="text/javascript">
	var prove="<?php echo $prove; ?>";
	console.log(prove);
	// Split timestamp into [ Y, M, D, h, m, s ]
var t = prove.split(/[- :]/);

// Apply each element to the Date function
var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3]-1, t[4], t[5]));

var x=parseInt((d.getTime()-d.getMilliseconds())/1000);



	var check=setInterval(function() {
			var a =new Date();
		 var z=parseInt((a.getTime()-a.getMilliseconds())/1000);
		 console.log(z);
		 console.log("--------");
		 console.log(x);
		if (z>x){

			alert("hello");
			clearInterval(check);

		}



	}, 1000);
</script>