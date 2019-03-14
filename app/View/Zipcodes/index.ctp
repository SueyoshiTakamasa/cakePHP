<div class="container pb-2">
<!-- 	<h1 class="font-weight-bold">住所検索のためのページ</h1> -->
	<div>
		<h3 class="font-weight-bold">CSVファイルのアップロード</h3>

		<?php echo $this->Form->create('Csv', array(
			'type'    => 'file',
			'class'   => 'mt-3',
		));?>

		<div class="form-group bg-white px-3 py-4">
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

				<?php echo $this->Form->submit('アップロードする', array(
				   'div'    => false,
				   'escape' => false,
				   'class'  => 'btn btn-fb--green mt-4 pl-4 pr-4',
				 ))?>
		</div>

	</div>


	<div class="mt-5">
		<h3 class="font-weight-bold">ご住所</h3>

		<?php echo $this->Form->create('Zipcode', array(
		  'class'      => 'mt-2',
		))?>

		<div class="bg-white px-3 pt-4 pb-4 border">
			<div class="form-group mb-0">
			    <label class="mb-0 font-weight-bold">郵便番号</label>
			  <?php echo $this->Form->input('zipcode', array(
			    'type' => 'text',
			    'div' => false,
			    'label' => false,
			    'class' => 'form-control w-25 mt-2',
			    'id'    => 'zipcode'
			    ))?>
			    <span class="d-block text-secondary mt-1">例：5192146</span>
			    <span class="d-block mt-2 text-secondary">ハイフンを入れずに全角もしくは半角でごください</span>
			</div>

			<div class="form-group mt-4 mb-0">
			    <label class="mb-0 font-weight-bold">都道府県</label>
			  <?php echo $this->Form->input('pref', array(
			    'type' => 'text',
			    'div' => false,
			    'label' => false,
			    'class' => 'form-control mt-2',
			    'id'    => 'pref',
			    ))?>
			    <span class="d-block text-secondary mt-1">例：三重県</span>
			</div>

			<div class="form-group mt-4 mb-0">
			    <label class="mb-0 font-weight-bold">市区町村</label>
			  <?php echo $this->Form->input('city', array(
			    'type' => 'text',
			    'div' => false,
			    'label' => false,
			    'class' => 'form-control mt-2',
			    'id'    => 'city',
			    ))?>
			    <span class="d-block text-secondary mt-1">例：松阪市阿波曽町</span>
			</div>
		</div>
	</div>


</div>


<?php echo $this->Form->end()?>