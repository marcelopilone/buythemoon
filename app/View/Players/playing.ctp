<script>
	$(document).ready(function(){
		setInterval(function(){
			$("#loadprice").load('/buythemoon/players/price_bitcoin/'+$('.idUsuario').text())
		}, 2000);
		setInterval(function(){
			$("#loadranking").load('/buythemoon/players/ranking/'+$('.idUsuario').text())
		}, 2000);
		$('#buyBitcoin').submit(function(e) {
	        e.preventDefault();
	        buyBitcoinNow();
    	}); 
    	$('#sellBitcoin').submit(function(e) {
	        e.preventDefault();
	        sellBitcoinNow();
    	}); 
			
	});
	function buyBitcoinNow(){
		$.ajax({
		    url: '/buythemoon/players/buyBitcoin/',
		    type:'POST',
			data: $('#buyBitcoin').serialize(),
		    success: function (data) {
		        $('#refresh').html(data);
		    }
		});
		$(".buttonBuy").attr("disabled", true);
		$(".buttonSell").attr("disabled", false);
    	setTimeout(function() {
    		$('.messageBuy').fadeOut('fast');
		}, 2000); 
	}
	function sellBitcoinNow(){
		$.ajax({
		    url: '/buythemoon/players/sellBitcoin/',
		    type:'POST',
			data: $('#sellBitcoin').serialize(),
		    success: function (data) {
		        $('#refresh').html(data);
		    }
		});
		$(".buttonBuy").attr("disabled", false);
		$(".buttonSell").attr("disabled", true);
		setTimeout(function() {
    		$('.messageSell').fadeOut('fast');
		}, 2000); 
	}
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
<?php 
	if( $player['Player']['amount_usd'] <= 0 && $player['Player']['amount_btc'] <= 0){
		?>
		<div class="alert alert-danger center">
			<strong>You can't buy and sell anymore because your balance of usd and btc is less than 0</strong>
		</div>
		<?php
	}
?>
<div class="row">
	<div class="col-md-6">
		<?php 
			echo $this->Form->create('Player',array(
				'id' => 'sellBitcoin'
			));
			echo $this->Form->hidden('id',array(
				'value' => $player['Player']['id']
			));
			echo $this->Form->hidden('sell',array(
				'value' => true,
			));
			$disabledSell = false;
			if( $player['Player']['amount_btc'] <= 0 ){
				$disabledSell = true;
			}
			$options = array('label' => 'Sell Bitcoin', 
				'class' => 'btn btn-danger btn-block buttonSell border border-white',
				'style' => 'color:white !important; font-weight: bold;',
				'div' => false,
				'disabled' => $disabledSell,
			);

			echo $this->Form->end($options);
		?>
	</div>
	<div class="col-md-6">
		<?php 
			echo $this->Form->create('Player',array(
				'id' => 'buyBitcoin',
			));
			echo $this->Form->hidden('id',array(
				'value' => $player['Player']['id']
			));
			echo $this->Form->hidden('buy',array(
				'value' => true,
			));

			$disabledBuy = false;
			if( $player['Player']['amount_usd'] <= 0 ){
				$disabledBuy = true;
			}

			$options = array('label' => 'Buy Bitcoin', 
				'class' => 'btn btn-success btn-block buttonBuy border border-white',
				'style' => 'color:white !important; font-weight: bold; ',
				'disabled' => $disabledBuy,
				'div' => false);

			echo $this->Form->end($options);
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="refresh"></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
	<div id="loadranking">
	</div>
</div>
</div>