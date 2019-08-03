<script>
$(document).ready(function(){
	setInterval(function(){
	$("#loadprice").load('/buythemoon/players/price_bitcoin')
	}, 2000);
});
</script>
<br/>
<h2 class="text-primary center">Welcome <strong><?php echo $player['Player']['name']?></strong>, trade the best you can</h2>
<br/>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-6 col-xs-6">
		<div id="loadprice"> </div>
		

	</div>
	<div class="col-md-6 col-xs-6">
	</div>
</div>