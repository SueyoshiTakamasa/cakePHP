<?php $this->Html->addCrumb('タグ一覧', '/tags'); ?>
<div class="row">
    <?php echo $this->element('admins/navi'); ?>
	<div class="col-sm-10 py-2 px-4" >
        <h4 class="border-bottom pt-1 pb-2">タグ一覧</h4>

		<!-- ここから | タグを追加-->
	    <div class="mt-4">
			<span>
				<?php
					echo $this->Html->link(__('タグを追加する'),
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

	<table class="table table-striped mt-4 bg-white">

		<thead>
		    <tr class="fz-14">
		        <th>タグ名</th>
		        <th></th>
		    </tr>
		</thead>

		<?php foreach($tags as $tag): ?>
		<tr>
			<td class="fz-14 align-middle py-1"><?php echo h($tag['Tag']['name']); ?>&nbsp;</td>
			<td class="text-right align-middle py-1">
				<span class=" fz-12 btn btn-light px-2 py-1 border">
				    <?php
				        echo $this->Html->link(
				            '編集',
				            array(
				                'controller' => 'tags',
				                'action' => 'edit',
				                 $tag['Tag']['id']
				            )
				        );
				    ?>
				</span>
				<span class=" fz-12 btn btn-light px-2 py-1 border">
				    <?php
				    echo $this->Form->postLink(
				        '削除',
				        array(
				            'controller' => 'categories',
				            'action'     => 'delete',
				             $tag['Tag']['id']
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

		<?php unset($tags); ?>
	</table>

	</div>

</div>
