<div class="ips index">
	<h2><?php echo __('Ips'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ips as $ip): ?>
	<tr>
		<td><?php echo h($ip['Ip']['id']); ?>&nbsp;</td>
		<td><?php echo h($ip['Ip']['number']); ?>&nbsp;</td>
		<td><?php echo h($ip['Ip']['updated']); ?>&nbsp;</td>
		<td><?php echo h($ip['Ip']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ip['Ip']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ip['Ip']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ip['Ip']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ip['Ip']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Ip'), array('action' => 'add')); ?></li>
	</ul>
</div>
