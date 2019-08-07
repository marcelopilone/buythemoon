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
	<div class="col-md-6">
		<?php 
			echo $this->Form->create('Player',array(
				'id' => 'sellBitcoin'
			));
			echo $this->Form->hidden('id',array(
				'value' => $player['Player']['id']
			));
			echo $this->Form->hidden('sell',array(
				'value' => true
			));
			$options = array('label' => 'Sell', 'class' => 'btn btn-danger btn-block', 'div' => false);
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
				'value' => true
			));
			$options = array('label' => 'Buy', 'class' => 'btn btn-success btn-block', 'div' => false);
			echo $this->Form->end($options);
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="refreshSell"></div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
	<div id="loadranking">
	</div>
</div>
</div>
<?php 
$dataSell = $this->Js->get('#sellBitcoin')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#sellBitcoin')->event(
   'submit',
   $this->Js->request(
    array('action' => 'sellBitcoin', 'controller' => 'players',$player['Player']['id']),
    array(
        'update' => '#refreshSell',
        'data' => $dataSell,
        'async' => true,    
        'dataExpression'=>true,
        'method' => 'POST'
    )
  )
);

$dataBuy = $this->Js->get('#buyBitcoin')->serializeForm(array('isForm' => true, 'inline' => true));
$this->Js->get('#buyBitcoin')->event(
   'submit',
   $this->Js->request(
    array('action' => 'buyBitcoin', 'controller' => 'players',$player['Player']['id']),
    array(
        'update' => '#refreshBuy',
        'data' => $dataBuy,
        'async' => true,    
        'dataExpression'=>true,
        'method' => 'POST'
    )
  )
);
echo $this->Js->writeBuffer();
?>

