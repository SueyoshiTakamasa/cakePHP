<div class="container py-4">

	<div>
		<?php phpinfo(); ?>
		<h3>CSVファイルのアップロード</h3>

		<?php echo $this->Form->create('Csv', array(
			'type'    => 'file',
		));?>

		<div class="form-group">
				<div class='d-flex align-items-center'>
				<?php
					echo $this->Form->input('file',
						array(
							'type'     => 'file',
							'label'    => '',
							'class'    => 'input-file cur-po',
							'multiple' => true,
							'id'       => '',
							'div'      => false,
						));
				?>
				</div>
		</div>

		<?php echo $this->Form->submit('アップロードする', array(
		   'div'    => false,
		   'escape' => false,
		   'class'  => 'btn btn-fb--green mt-2 pl-4 pr-4',
		 ))?>

	</div>


	<div class="mt-5">
		<h3 class="font-weight-bold">住所検索</h3>

		<?php echo $this->Form->create('Zipcode', array(
		  'class'      => 'mt-2',
		))?>

		<div class="form-group w-25 mb-0">
		    <label class="mb-0 font-weight-bold" style="font-size:12px;">郵便番号</label>
		  <?php echo $this->Form->input('zipcode', array(
		    'type' => 'text',
		    'div' => false,
		    'label' => false,
		    'class' => 'form-control',
		    'id'    => 'zipcode'
		    ))?>
		</div>

		<div class="form-group mb-0">
		    <label class="mb-0 font-weight-bold" style="font-size:12px;">都道府県</label>
		  <?php echo $this->Form->input('pref', array(
		    'type' => 'text',
		    'div' => false,
		    'label' => false,
		    'class' => 'form-control',
		    'id'    => 'pref',
		    ))?>
		</div>

		<div class="form-group mb-0">
		    <label class="mb-0 font-weight-bold" style="font-size:12px;">市区町村</label>
		  <?php echo $this->Form->input('city', array(
		    'type' => 'text',
		    'div' => false,
		    'label' => false,
		    'class' => 'form-control',
		    'id'    => 'city',
		    ))?>
		</div>
	</div>


</div>


<?php echo $this->Form->end()?>