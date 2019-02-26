
<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<div style="display:flex;">
	<?php 

	  $attachment = $post['Attachment']; /*画像データが一枚ずつ格納された配列*/

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

	?>
</div>


<p><?php echo h($post['Post']['body']); ?></p>
