<script>
	$(document).ready(function(){
		setInterval(function(){
			$("#loadprice").load('/buythemoon/players/price_bitcoin')
		}, 2000);
		setInterval(function(){
			$("#loadranking").load('/buythemoon/players/ranking/'+$('.idUsuario').text())
		}, 2000);
	});
</script>
<br/>
<div class="idUsuario" style="display: none;"><?php echo $player['Player']['id']?></div>
<div class="row">
	<div class="col-md-12">
<h2 class="text-primary center">Welcome <strong><?php echo $player['Player']['name']?></strong>, trade the best you can</h2>
</div>
</div>
<br/>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div id="loadprice"> </div>
	</div>
</div><br/>
<div class="row">
	<div id="loadranking">
	</div>
</div>