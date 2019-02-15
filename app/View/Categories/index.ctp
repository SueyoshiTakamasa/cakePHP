<!--
カテゴリー初期画面
-->
<!-- categories -->
<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>

	<!-- ここから | カテゴリー一覧を表示-->
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?>
		</td>
	</tr>
    <?php endforeach; ?>
    <!-- ここまで | カテゴリー一覧を表示-->

    <!-- ここから | カテゴリーを追加-->
    <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?></li>
	</ul>
	</div>
	<!-- ここまで | カテゴリーを追加-->

</div>
<!-- /categories -->