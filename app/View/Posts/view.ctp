
<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<?php 

	  $attachment = $post['Attachment']; /*画像データが一枚ずつ格納された配列*/

		for($i = 0; $i < count($attachment); $i++){
			if($i % 6 == 0){echo '<div class="row">';}
			echo '<div>';
			echo $this->Html->image($imgSrcPrefix.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],array(
				'id'=>'thumbnail'.$i,
				'width'=>'256',
			));
			echo '</div>';
			if($i % 6 == 5 || $i+1 >= count($attachment)){echo '</div>';}
		}
		
?>

<p><?php echo h($post['Post']['body']); ?></p>
