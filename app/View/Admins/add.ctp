<div class="admins form">
<?php echo $this->Form->create('Admin'); ?>
	<fieldset>
		<legend><?php echo __('Add Admin'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('username_canonical');
		echo $this->Form->input('email');
		echo $this->Form->input('email_canonical');
		echo $this->Form->input('enabled');
		echo $this->Form->input('salt');
		echo $this->Form->input('password');
		echo $this->Form->input('last_login');
		echo $this->Form->input('locked');
		echo $this->Form->input('expired');
		echo $this->Form->input('expires_at');
		echo $this->Form->input('confirmation_token');
		echo $this->Form->input('password_requested_at');
		echo $this->Form->input('roles');
		echo $this->Form->input('credentials_expired');
		echo $this->Form->input('credentials_expire_at');
		echo $this->Form->input('status');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('mobile_number');
		echo $this->Form->input('address');
		echo $this->Form->input('permission');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
