<div class="container">
	<h2 class="font-weight-bold">タグ一覧</h2>

		<!-- ここから | タグを追加-->
	    <div class="mt-4">
			<span>
				<?php
					echo $this->Html->link(__('タグを追加する'),
						array(
							'action' => 'add'
						),
						array(
							'class'  => 'btn btn-fb--green px-3'
						)
					);
				?>
			</span>
		</div>
		<!-- ここまで | タグを追加-->

	<table class="table table-bordered mt-4 bg-white">
<!-- 		<tr class="">
	        <th class="w-75">タグ名</th>
	        <th></th>
	    </tr> -->

		<?php foreach($tags as $tag): ?>
		<tr>
			<td class="w-75"><?php echo h($tag['Tag']['name']); ?>&nbsp;</td>
			<td class="text-center">
				<!-- <?php
				echo $this->Html->link(__('詳細'),
				array(
					'action' => 'view', $tag['Tag']['id'],
				)
				);
				?> -->
				<?php
					echo $this->Html->link(__('編集する'),
						array(
							'action' => 'edit', $tag['Tag']['id']
						),
						array(
							'class'  => 'btn btn-outline-fb-blue mr-1 px-4'
						)
					);
				?>
				<?php
					echo $this->Form->postLink(__('削除する'),
						array(
							'action' => 'delete', $tag['Tag']['id']
						),
						array(
							'confirm' => __('Are you sure you want to delete # %s?', $tag['Tag']['id']),
							'class'   => 'btn btn-outline-secondary px-4'
						)
					);
				?>
			</td>
		</tr>
		<?php endforeach; ?>

		<?php unset($tags); ?>
	</table>

</div>
