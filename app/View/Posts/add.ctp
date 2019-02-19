<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array(
	'required' => false,
));
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
echo $this->Form->end('保存する');
?>
