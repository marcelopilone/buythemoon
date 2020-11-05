<div class="cartas index">
	<h2><?php echo __('Cartas'); ?></h2>
	<table class="table table-stripped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('path_img'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cartas as $carta): ?>
	<tr>
		<td><?php echo h($carta['Carta']['id']); ?>&nbsp;</td>
		<td><?php echo h($carta['Carta']['path_img']); ?>&nbsp;</td>
		<td><?php echo h($carta['Carta']['valor']); ?>&nbsp;</td>
		<td><?php echo h($carta['Carta']['updated']); ?>&nbsp;</td>
		<td><?php echo h($carta['Carta']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $carta['Carta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $carta['Carta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $carta['Carta']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $carta['Carta']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Carta'), array('action' => 'add')); ?></li>
	</ul>
</div>
