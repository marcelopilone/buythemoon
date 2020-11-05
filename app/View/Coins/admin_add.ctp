<div class="coins form">
<?php echo $this->Form->create('Coin'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Coin'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('short_name');
		echo $this->Form->input('image');
		echo $this->Form->input('amount_usd');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coins'), array('action' => 'index')); ?></li>
	</ul>
</div>
