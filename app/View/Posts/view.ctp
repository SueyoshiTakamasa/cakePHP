<div class="container">


	<div class="">
		<h1 class="mr-auto ff-mincho"><?php echo h($post['Post']['title']); ?></h1>
		<span class="d-block text-muted">
		    <?php
		        $explode = explode(" ", $post['Post']['created']);
		        $split   = split("-", $explode[0]);
		        $year    = $split[0];
		        $month   = $split[1];
		        $day    = $split[2];
		    ?>
		    <?php echo $year; ?>年
		    <?php echo $month; ?>月
		    <?php echo $day; ?>日
		</span>
	</div>

	<!-- 記事製作者にのみ表示 -->
	<?php

		if($user === $post['Post']['user_id']){
			echo '<div class="">';
	        echo $this->Html->link(
	            '編集する',
	            array(
	                'action' => 'edit', $post['Post']['id']
	            ),
	            array(
	                'class'  => 'btn btn-fb--green btn-sm'
	            )
	        );

	        echo $this->Form->postLink(
	            '削除する',
	            array(
	                'controller' => 'posts',
	                'action'     => 'delete',
	                 $post['Post']['id']
	             ),
	            array(
	                'confirm'    => 'Are you sure?',
	                'class'      => 'btn btn-secondary ml-2 btn-sm'
	            )
	        );
	        echo '</div>';
	    }
	?>

	<div>
		<?php 

		  $attachment = $post['Attachment']; /*画像データが一枚ずつ格納された配列*/

			echo '<div class="d-flex flex-wrap mt-4">';
			for($i = 0; $i < count($attachment); $i++){
				if(!$attachment[$i]['deleted'] && !empty($attachment[$i]['photo'])){
					echo '<div class="m-1 to-modal" data-toggle="modal" style="width:24%;" data-target="#ModalCenter" data-id=';
					echo '"image'.$attachment[$i]['photo_dir'].'">';
					echo $this->Html->image('/images/get/'.'attachment/photo/'.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],
						array(
							'id'      => 'thumbnail'.$attachment[$i]['photo_dir'],
							'class'   => 'd-block img-fluid cur-po'
				    	));
					echo '</div>';
				}
			}
			echo '</div>';

		?>
	</div>


	<div class="mt-4 px-3 pt-2 pb-3 bg-white">
		<?php echo h($post['Post']['body']); ?>
	</div>


	<!-- Modal -->
	<div class="modal" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body p-1 position-relative">
	         <div id="carouselControls" class="carousel slide" data-ride="carousel">
	           <div class="carousel-inner">

	               <?php

	               for($i = 0; $i < count($attachment); $i++){

		               	if(!$attachment[$i]['deleted'] && !empty($attachment[$i]['photo'])){
		               	echo '<div class="carousel-item" id=';
	               		echo '"image'.$attachment[$i]['photo_dir'].'">';
		               	echo $this->Html->image('/images/get/'.'attachment/photo/'.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],
		               		array(
		               			'id'      => 'thumbnail'.$attachment[$i]['photo_dir'],
		               			'class'   => 'd-block img-fluid '
		                   	));
		               	echo '</div>';
		               }
	           		}
	                ?>

	           </div>
	           <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
	             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	             <span class="sr-only">Previous</span>
	           </a>
	           <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
	             <span class="carousel-control-next-icon" aria-hidden="true"></span>
	             <span class="sr-only">Next</span>
	           </a>
	         </div>
	         <button type="button" class="close position-absolute" data-dismiss="modal" aria-label="Close">
	          <span class="text-white" aria-hidden="true">&times;</span>
	        </button>
	        <div class="position-absolute text-white slide-items"></div>
	      </div>
	    </div>
	  </div>
	</div>
</div>

