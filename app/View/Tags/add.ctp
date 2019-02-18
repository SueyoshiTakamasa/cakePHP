<!-- カテゴリー追加用ページ-->

<div class="categories form">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('タグを追加'); ?></legend>
	<?php echo $this->Form->input('name');?>
	</fieldset>
    <?php echo $this->Form->end(__('確定')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
		    <?php echo $this->Html->link(__('タグ一覧'), array('action' => 'index')); ?>
		</li>
	</ul>
</div>