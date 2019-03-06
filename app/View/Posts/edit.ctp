<div class="container py-4">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
			<?php
				echo $this->Html->link(
					'ホーム',
					array(
						'action'  => 'index'
					),
					array(
						'class'   => 'text-primary'
					)
				)
			?>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<!-- <?php echo $this->data['Post']['title'];  ?> -->
				編集ページ
			</li>
		</ol>
	</nav>

	<h1>編集ページ</h1>

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

		<div class="d-flex flex-wrap">
			<?php
				for($i = 0; $i < count($attachment); $i++){
					if(!$attachment[$i]['deleted'] && !empty($attachment[$i]['photo'])){
						echo '<div class="w-50 p-2 bg-white border">';
						echo $this->Html->image('/images/get/'.'attachment/photo/'.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],array(
						'id'=>'thumbnail'.$attachment[$i]['photo_dir'],
						'class'   => 'd-block img-fluid'
					    ));
					    echo '<div class="d-flex align-items-center mt-2">';
					    echo '<label class="btn btn-sm p-2 border rounded mb-0 bg-gradient-light cur-po" for="';
					    echo 'attachment'.$attachment[$i]['id'].'">';
					    echo 'この画像を削除する</label><input type="checkbox" name="data[Post][Attachment][]" class="d-none checkbox-or" value="';
						echo $attachment[$i]['id'].'"id="';
						echo 'attachment'.$attachment[$i]['id'].'">';
						echo '<span class="checkbox-or__text text-danger ml-2 bg-sakura py-2 px-5">この画像は削除されます</span>';
						echo '</div>';
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

