<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
	echo $this->Form->create('Post',array(
		'type' => 'file',
	));
	echo $this->Form->input('title');
	echo $this->Form->input('category_id',array(
		'type'     =>'select',
		'options'  =>$list));
	echo $this->Form->input('Tag',array(
		'type'     =>'select',
		'options'  =>$tag,
		'multiple' => 'checkbox',
		'size'     => 5,
		'class'    =>'check--original'));

	echo $this->Form->input('Attachment.0.photo', array('type' => 'file'));

	echo $this->Form->input('Attachment',array(
		'type'     =>'select',
		'options'  =>$photo,
		'multiple' => 'checkbox',
		'label'    => '削除する画像をチェックする',
		'size'     => 5,
		'class'    =>'check--original'));

	echo '<div class="row">';
		for($i = 0; $i < count($attachment); $i++){
			if(!$attachment[$i]['deleted'] && !empty($attachment[$i]['photo'])){
				echo $this->Html->image('/images/get/'.'attachment/photo/'.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],array(
				'id'=>'thumbnail'.$attachment[$i]['photo_dir'],
				'width'=>'400',
			    ));
			}
		}
	echo '</div>';

	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Save Post');
?>
