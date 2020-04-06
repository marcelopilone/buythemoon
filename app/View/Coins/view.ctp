<div class="coins view">
<h2><?php echo __('Coin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coin['Coin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($coin['Coin']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Name'); ?></dt>
		<dd>
			<?php echo h($coin['Coin']['short_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($coin['Coin']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount Usd'); ?></dt>
		<dd>
			<?php echo h($coin['Coin']['amount_usd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($coin['Coin']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($coin['Coin']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coin'), array('action' => 'edit', $coin['Coin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coin'), array('action' => 'delete', $coin['Coin']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $coin['Coin']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Coins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coin'), array('action' => 'add')); ?> </li>
	</ul>
</div>
