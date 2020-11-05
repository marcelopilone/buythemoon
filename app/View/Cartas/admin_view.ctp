<div class="cartas view">
<h2><?php echo __('Carta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carta['Carta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path Img'); ?></dt>
		<dd>
			<?php echo h($carta['Carta']['path_img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($carta['Carta']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($carta['Carta']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($carta['Carta']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Carta'), array('action' => 'edit', $carta['Carta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carta'), array('action' => 'delete', $carta['Carta']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $carta['Carta']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cartas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carta'), array('action' => 'add')); ?> </li>
	</ul>
</div>
