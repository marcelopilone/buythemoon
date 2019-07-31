<div class="players form">
<?php echo $this->Form->create('Player'); ?>
	<fieldset>
		<legend><?php echo __('Add Player'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('amount_usd');
		echo $this->Form->input('amount_btc');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?></li>
	</ul>
</div>
