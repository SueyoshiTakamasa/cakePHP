
<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<div style="display:flex;">
	<?php 

	  $attachment = $post['Attachment']; /*画像データが一枚ずつ格納された配列*/

		for($i = 0; $i < count($attachment); $i++){
			if($i % 6 == 0){echo '<div class="row">';}

			echo $this->Html->image('/images/get/'.'attachment/photo/'.$post['Attachment'][$i]['photo_dir'].DS.$post['Attachment'][$i]['photo'],array(
				'id'=>'thumbnail'.$i,
				'width'=>'400',
			));

			if($i % 6 == 5 || $i+1 >= count($attachment)){echo '</div>';}
		}

	?>
</div>


<p><?php echo h($post['Post']['body']); ?></p>
