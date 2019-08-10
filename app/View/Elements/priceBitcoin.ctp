<div class="card center border border-primary">
			<?php 
				$Coin = ClassRegistry::init('Coin');
				$price = $Coin->find('first',array(
					'conditions' => array(
						'Coin.id' => 1
					)
				));
			?>
		  <div class="card-body">
		  		<div class="row">
		  			<div class="col-md-4 col-4">
		  				Price of Bitcoin in <strong>Binance:</strong> <strong><span class="text-primary"><?php echo 
			  			$this->Number->currency($price['Coin']['amount_usd']);
			  			?></span></strong>
		  			</div>
		  			<div class="col-md-4 col-4">
		  				Balance <strong>Tether:</strong> <strong><span class="text-primary"><?php echo 
			  			$this->Number->currency($player['Player']['amount_usd']);
			  			?></span></strong>
		  			</div>
		  			<div class="col-md-4 col-4">
		  				Balance <strong>BTC:</strong> <strong><span class="text-primary"><?php echo 
			  			$player['Player']['amount_btc'];
			  			?></span></strong>
		  			</div>
		  		</div>
			  	
		</div> 
</div>