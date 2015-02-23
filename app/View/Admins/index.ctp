<div class="admins index">
	<h2><?php echo __('Admins'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('username_canonical'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('email_canonical'); ?></th>
			<th><?php echo $this->Paginator->sort('enabled'); ?></th>
			<th><?php echo $this->Paginator->sort('salt'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('last_login'); ?></th>
			<th><?php echo $this->Paginator->sort('locked'); ?></th>
			<th><?php echo $this->Paginator->sort('expired'); ?></th>
			<th><?php echo $this->Paginator->sort('expires_at'); ?></th>
			<th><?php echo $this->Paginator->sort('confirmation_token'); ?></th>
			<th><?php echo $this->Paginator->sort('password_requested_at'); ?></th>
			<th><?php echo $this->Paginator->sort('roles'); ?></th>
			<th><?php echo $this->Paginator->sort('credentials_expired'); ?></th>
			<th><?php echo $this->Paginator->sort('credentials_expire_at'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile_number'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('permission'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($admins as $admin): ?>
	<tr>
		<td><?php echo h($admin['Admin']['id']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['username']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['username_canonical']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['email']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['email_canonical']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['enabled']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['salt']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['password']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['last_login']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['locked']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['expired']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['expires_at']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['confirmation_token']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['password_requested_at']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['roles']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['credentials_expired']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['credentials_expire_at']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['status']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['mobile_number']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['address']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['permission']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['created']); ?>&nbsp;</td>
		<td><?php echo h($admin['Admin']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $admin['Admin']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $admin['Admin']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $admin['Admin']['id']), array(), __('Are you sure you want to delete # %s?', $admin['Admin']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Admin'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
