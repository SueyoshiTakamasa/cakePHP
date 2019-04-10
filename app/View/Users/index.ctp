<?php $this->Html->addCrumb('ユーザー一覧', '/users'); ?>
<div class="row">
    <?php echo $this->element('admins/navi'); ?>
	<div class="col-sm-10 py-2 px-4" >
        <h4 class="border-bottom pt-1 pb-2">ユーザー一覧</h4>

		<!-- ここから | タグを追加-->
	    <div class="mt-4">
			<span>
				<?php
					echo $this->Html->link(__('ユーザーを追加する'),
						array(
							'action' => 'add'
						),
						array(
							'class'  => 'btn btn-fb--green px-3 fz-12'
						)
					);
				?>
			</span>
		</div>
		<!-- ここまで | タグを追加-->

	<table class="table mt-4 bg-white">
<!-- 		<tr class="">
	        <th class="w-75">タグ名</th>
	        <th></th>
	    </tr> -->

		<?php foreach($users as $user): ?>
		<tr>
			<td class="fz-14"><?php echo h($user['User']['username']); ?>&nbsp;</td>
			<td class="text-right">
				<span class=" fz-12 btn btn-light px-2 py-1 border">
				    <?php
				        echo $this->Html->link(
				            '編集',
				            array(
				                'controller' => 'users',
				                'action' => 'edit',
				                 $user['User']['id']
				            )
				        );
				    ?>
				</span>
				<span class=" fz-12 btn btn-light px-2 py-1 border">
				    <?php
				    echo $this->Form->postLink(
				        '削除',
				        array(
				            'controller' => 'users',
				            'action'     => 'delete',
				             $user['User']['id']
				         ),
				        array(
				            'confirm'    => ' この記事を削除してよろしいいですか？',
				        )
				    );
				    ?>
				</span>
			</td>
		</tr>
		<?php endforeach; ?>

		<?php unset($users); ?>
	</table>

	</div>

</div>
