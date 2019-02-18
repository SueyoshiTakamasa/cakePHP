<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('category_id',array(
		'type'=>'select',
		'options'=>$list));
	echo $this->Form->input('Tag',array(
		'type'=>'select',
		'options'=>$tag,
		'multiple' => 'checkbox',
		'size' => 5,
		'class'=>'checkbox'));
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Save Post');
?>
