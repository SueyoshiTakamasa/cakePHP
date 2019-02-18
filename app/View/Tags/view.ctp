<div class="Tags view">
<h2><?php echo __('タグ詳細'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('タグ名'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('タグを編集する'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('タグを削除する'), array('action' => 'delete', $tag['Tag']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tag['Tag']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('タグ一覧'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('タグを追加する'), array('action' => 'add')); ?> </li>
	</ul>
</div>