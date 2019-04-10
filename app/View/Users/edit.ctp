<?php $this->Html->addCrumb('ユーザー一覧', '/users'); ?>
<div class="row">
    <?php echo $this->element('admins/navi'); ?>
	<div class="col-sm-10 pt-2 pb-5 px-4" >
        <h4 class="border-bottom pt-1 pb-2">ユーザー編集</h4>

		<?php echo $this->Form->create('User'); ?>
			<table class="table table-bordered mt-4">
				<tr>
					<th class='align-middle bg-light' style="width:16%;">ユーザー名<span class="badge badge-danger fz-12 float-right">必須</span></th>
					<td class='px-4 py-3'>
						<div class="col-sm-3 p-0">
							<?php echo $this->Form->input('username',
								array(
									'label' => false,
									'class' => 'form-control',
								)
							);?>
						</div>
					</td>
				</tr>
				<tr>
					<th class="align-middle bg-light">パスワード<span class="badge badge-danger fz-12 float-right">必須</span></th>
					<td class='px-4 py-3'>
						<div class="col-sm-3 p-0">
							<?php echo $this->Form->input('password',
								array(
									'label' => false,
									'class' => 'form-control',
								)
							);?>
						</div>
					</td>
				</tr>
				<tr class="border-bottom">
					<th class="align-middle bg-light">権限<span class="badge badge-danger fz-12 float-right">必須</span></th>
					<td class='px-4 py-3'>
						<div class="col-sm-2 p-0">
							<?php echo $this->Form->input('role',
								array(
									'label' => false,
									'class' => 'form-control',
									'options' => array('admin' => '管理者', 'author' => '編集者')
								)
							);?>
						</div>
					</td>
				</tr>
			</table>
		<div class="">
			<?php echo $this->Form->submit('編集を確定する', array(
			   'div'    => false,
			   'escape' => false,
			   'class'  => 'btn btn-fb--green mt-2 pl-4 pr-4 h-25',
			 ))?>
		</div>
		<?php
			echo $this->Form->end();
		?>

	</div>

</div>
