<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
	echo $this->Form->create('Post',array('type' => 'file'));
	echo $this->Form->input('title');
	echo $this->Form->input('category_id',array(
		'type'     =>'select',
		'options'  =>$list));
	echo $this->Form->input('Tag',array(
		'type'     =>'select',
		'options'  =>$tag,
		'multiple' => 'checkbox',
		'size'     => 5,
		'class'    =>'checkbox'));

	echo $this->Form->input('Attachment.0.photo', array('type' => 'file'));

		for($i = 0; $i < count($attachment); $i++){
			if($i % 6 == 0){echo '<div class="row">';}

            if(isset($attachment[$i]['photo_dir'])) {
            	echo $this->Html->image('/images/get/'.'attachment/photo/'.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],array(
				'id'=>'thumbnail'.$i,
				'width'=>'400',
			    ));
			    echo $this->Form->input("delete",["type"=>"submit",
			    	"name"=>"file_delete",
                    "value"=>$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo']
                ]);
            }

			if($i % 6 == 5 || $i+1 >= count($attachment)){echo '</div>';}
		}
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->end('Save Post');
?>
