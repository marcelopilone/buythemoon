<div class="players form">
<?php echo $this->Form->create('Player'); ?>
	<fieldset>
		<legend><?php echo __('Edit Player'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Player.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Player.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?></li>
	</ul>
</div>
