<div class="tags index">
	<h2><?php echo __('タグ一覧'); ?></h2>

	<table>
		<tr>
	        <th>ID</th>
	        <th>タグ名</th>
	        <th>詳細・編集・削除</th>
	    </tr>

		<?php foreach($tags as $tag): ?>
		<tr class="row clickable-row">
			<td><?php echo h($tag['Tag']['id']); ?>&nbsp;</td>
			<td><?php echo h($tag['Tag']['name']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $tag['Tag']['id'])); ?>
				<?php echo $this->Html->link(__('編集'), array('action' => 'edit', $tag['Tag']['id'])); ?>
				<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $tag['Tag']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tag['Tag']['id']))); ?>
			</td>
		</tr>
		<?php endforeach; ?>

		<?php unset($tags); ?>
	</table>

	<!-- ここから | タグを追加-->
    <div class="actions">
	<ul>
		<li style="text-align:center;"><?php echo $this->Html->link(__('タグを追加する'), array('action' => 'add')); ?></li>
	</ul>
	</div>
	<!-- ここまで | タグを追加-->

</div>
