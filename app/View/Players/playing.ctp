<script>
$(document).ready(function(){
	setInterval(function(){
	$("#loadprice").load('/buythemoon/players/price_bitcoin')
	}, 2000);
});
</script>
<br/>
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
	<div class="col-md-12">
		<div class="card">
		  <div class="card-header center"><strong>Ranking</strong> | 
		  	<strong>Your position is: #<?php echo $rankPlayer?></strong>
		  </div>
		  <div class="card-body">
		  		<table class="table table-sm center" width="100%">
		  			<?php 
		  				$headers = array(
		  					'#',
		  					'Name',
		  					'Amount'
		  				);
		  			?>
		  			<thead>
		  				<?php 
		  					echo $this->Html->tableHeaders( $headers );
		  				?>
		  			</thead>
		  			<tbody>
		  				<?php 
		  					$cels = array();
		  					foreach( $ranking as $k=>$rank ){
		  						$cels[] = array(
		  							$k+1,
		  							$rank['Player']['name'],
		  							$this->Number->currency( $rank['Player']['amount_usd'] ),
		  						);
		  					}
		  					echo $this->Html->tableCells( $cels );
		  				?>
		  			</tbody>
		  		</table>
		  </div> 
		</div>
	</div>
</div>