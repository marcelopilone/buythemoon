<div class="cartas form">
<?php echo $this->Form->create('Carta'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Carta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('path_img');
		echo $this->Form->input('valor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Carta.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Carta.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Cartas'), array('action' => 'index')); ?></li>
	</ul>
</div>
