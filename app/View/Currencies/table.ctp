<h2><?php echo __('Currencies'); ?></h2>
<div class="row">
	<div class="col-md-12 col-xs-12">
	<table class="table table-bordered" style="background-color: white; color:black; text-align: center;">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('ranking'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('market_cap_usd','Market Cap'); ?></th>
					<th><?php echo $this->Paginator->sort('price_usd','Price'); ?></th>
					<th><?php echo $this->Paginator->sort('24h_volume_usd','24Hs'); ?></th>
					<th>Circulating supply</th>
					<th><?php echo $this->Paginator->sort('percent_change_24h','24Hs(Change)'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($currencies as $currency){  
				$percentChange = $currency['Currency']['percent_change_24h'];
				$classSuccess = 'percentHeight';
				if( $percentChange < 0 ){
					$classSuccess = 'percentLess';
				}

				?>
					<tr class=" <?php echo $classSuccess;?> ">
						<td><?php echo h($currency['Currency']['rank']); ?>&nbsp;</td>
						<td><strong><?php echo h($currency['Currency']['name']); ?></strong></td>
						<td><?php echo $this->Number->Currency ( $currency['Currency']['market_cap_usd']); ?>&nbsp;</td>
						<td><strong><?php echo  $this->Number->Currency ( $currency['Currency']['price_usd'] ); ?></strong></td>
						<td><?php echo  $this->Number->Currency ( $currency['Currency']['24h_volume_usd'] ); ?>&nbsp;</td>
						<td><?php echo  $currency['Currency']['available_supply']."<small>".$currency['Currency']['symbol']."</small>"; ?>&nbsp;</td>
						<td><?php echo  $percentChange ; ?>%</td>
					</tr>
		<?php }; ?>
			</tbody>
	</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<p>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</div>
</div>

