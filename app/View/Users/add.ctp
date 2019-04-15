<?php
	$this->Html->addCrumb('メンバー一覧', '/users');
	$this->Html->addCrumb('メンバー登録', '');
?>
<div class="row">
    <?php echo $this->element('admins/navi'); ?>
	<div class="col-sm-10 pt-2 pb-5 px-4" >
        <h4 class="border-bottom pt-1 pb-2">メンバー登録</h4>
		<?php echo $this->Form->create('User'); ?>
			<table class="table table-bordered mt-4 w-75">
				<tr>
					<th class='align-middle bg-light fz-14' style="width:18%;">メンバーネーム<span class="badge badge-danger float-right">必須</span></th>
					<td class='px-4 py-3'>
						<div class="col-sm-3 p-0">
							<?php echo $this->Form->input('username',
								array(
									'label'   => false,
									'class'   => 'form-control form-control-sm',
								)
							);?>
						</div>
					</td>
				</tr>
				<tr>
					<th class="align-middle bg-light fz-14">パスワード<span class="badge badge-danger float-right">必須</span></th>
					<td class='px-4 py-3'>
						<div class="col-sm-3 p-0">
							<?php echo $this->Form->input('password',
								array(
									'label' => false,
									'class' => 'form-control form-control-sm',
									'default' => '',
								)
							);?>
						</div>
					</td>
				</tr>
				<tr class="border-bottom">
					<th class="align-middle bg-light fz-14">権限<span class="badge badge-danger float-right">必須</span></th>
					<td class='px-4 py-3'>
						<div class="col-sm-2 p-0">
							<?php echo $this->Form->input('role',
								array(
									'label' => false,
									'class' => 'form-control form-control-sm',
									'options' => array('admin' => '管理者', 'author' => '編集者'),
								)
							);?>
						</div>
					</td>
				</tr>
			</table>
		<div class="">
			<?php echo $this->Form->submit('メンバー登録する', array(
			   'div'    => false,
			   'escape' => false,
			   'class'  => 'btn btn-fb--green mt-2 pl-4 pr-4 h-25 fz-12',
			 ))?>
		</div>
		<?php
			echo $this->Form->end();
		?>

	</div>

</div>
