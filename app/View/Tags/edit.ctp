<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('タグを編集'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('確定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $this->Form->value('Tag.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Tag.id')))); ?></li>
		<li><?php echo $this->Html->link(__('タグ一覧'), array('action' => 'index')); ?></li>
	</ul>
</div>