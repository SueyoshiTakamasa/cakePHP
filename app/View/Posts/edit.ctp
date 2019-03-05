<!-- File: /app/View/Posts/edit.ctp -->
<div class="container py-4">
	<h1>編集</h1>

	<?php
		echo $this->Form->create('Post',array(
			'type' => 'file',
		));
	?>

	<div class="form-group">
		<label class="mb-0 font-weight-bold">タイトル</label>
		<?php
			echo $this->Form->input('title',
				array(
					'class'   => 'form-control',
					'label'   => '',
					'div'     => false,
				)
			);
		?>
	</div>

	<div class="form-group">
		<label class="mb-0 font-weight-bold">カテゴリー</label>
		<?php
			echo $this->Form->input('category_id',
				array(
					'type'     =>'select',
					'options'  =>$list,
					'class'   => 'form-control w-50',
					'label'   => '',
					'div'     => false,
				)
			);
		?>
	</div>

	<div class="form-group">
		<label class="mb-0 font-weight-bold">タグ</label>
		<div class="check-box d-flex bg-white p-2 border rounded">
			<?php
				echo $this->Form->input('Tag',array(
					'type'     =>'select',
					'options'  =>$tag,
					'multiple' => 'checkbox',
					'size'     => 5,
					'class'   => 'form-check',
					'label'   => '',
					'div'     => false,
				));
			?>
		</div>
	</div>

	<div class="form-group">
		<label class="mb-0 font-weight-bold">画像</label>
		<div class="d-flex bg-white p-2 border rounded">
			<?php
				echo $this->Form->input('Attachment.0.photo',
					array(
						'type'   => 'file',
						'label'  => '',
						'class'  => '',
					));
			?>
		</div>
	</div>

	<div class="form-group">
		<label class="mb-0 font-weight-bold">削除する画像をチェックする</label>
		<div class="check-box d-flex bg-white p-2 border rounded">
			<?php
				echo $this->Form->input('Attachment',array(
					'type'     =>'select',
					'options'  =>$photo,
					'multiple' => 'checkbox',
					'label'    => '',
					'size'     => 5,
					'class'    =>'form-check',
					'div'      => false,
					'data-id'  => 1,
				));
			?>
		</div>

		<div class="d-flex flex-wrap">
			<?php
				for($i = 0; $i < count($attachment); $i++){
					if(!$attachment[$i]['deleted'] && !empty($attachment[$i]['photo'])){
						echo '<div class="w-50">';
						// $Attachment = 'Attachment'.[];
						// echo  $this->Form->checkbox($attachment, array(
						// 	// 'type'    => 'select',
						// 	'value'   => $attachment[$i]['id'],
						// 	// 'multiple'=> 'checkbox',
						// 	'label'   => $attachment[$i]['id'],
						// 	'size'    => 5,
						// 	'class'   => 'form-check',
						// 	'div'     => false,

						// ));
						echo $this->Html->image('/images/get/'.'attachment/photo/'.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],array(
						'id'=>'thumbnail'.$attachment[$i]['photo_dir'],
						'class'   => 'd-block img-fluid'
					    ));
					    echo '</div>';
					}
				}
			?>
		</div>

	</div>


	<div class="form-group mt-3">
		<label class="mb-0 font-weight-bold">本文</label>
		<?php
			echo $this->Form->input('body',
				array(
					'label'   => '',
					'class'   => 'form-group border py-2 px-3 w-100 rounded',
				));
		?>
	</div>

	<?php
		echo $this->Form->input('id', array('type' => 'hidden'));
	 ?>

	<?php echo $this->Form->submit('編集を確定する', array(
	   'div'    => false,
	   'escape' => false,
	   'class'  => 'btn btn-fb--green mt-2 pl-4 pr-4 h-25',
	 ))?>
	<?php
		echo $this->Form->end();
	?>
</div>

