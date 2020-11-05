<div class="cartas form">
<?php echo $this->Form->create('Carta'); ?>
	<fieldset>
		<legend><?php echo __('Add Carta'); ?></legend>
	<?php
		echo $this->Form->input('path_img');
		echo $this->Form->input('valor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cartas'), array('action' => 'index')); ?></li>
	</ul>
</div>
