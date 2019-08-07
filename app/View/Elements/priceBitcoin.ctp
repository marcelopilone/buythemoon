<div class="card center">
			<?php 
				$Coin = ClassRegistry::init('Coin');
				$price = $Coin->find('first',array(
					'conditions' => array(
						'Coin.id' => 1
					)
				));
			?>
			  <div class="card-body">Price of Bitcoin in <strong>Binance:</strong> <strong><span class="text-primary"><?php echo 
			  	$this->Number->currency($price['Coin']['amount_usd']);
			  ?></span></strong></div> 
		</div>