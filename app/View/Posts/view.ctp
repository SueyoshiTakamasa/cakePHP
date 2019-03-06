<div class="container pt-4">
	<nav aria-label="breadcrumb mb-4">
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
				<?php echo $post['Post']['title'];  ?>
			</li>
		</ol>
		<!-- <?php
		echo $this->Html->getCrumbs();
		?> -->
	</nav>

	<div class="d-flex align-items-center">
		<h1 class="mr-auto"><?php echo h($post['Post']['title']); ?></h1>
		<span class="d-block text-muted">
		    <i class="far fa-calendar-alt"></i>
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
					echo '<div class="w-50">';
					echo $this->Html->image('/images/get/'.'attachment/photo/'.$attachment[$i]['photo_dir'].DS.$attachment[$i]['photo'],
						array(
							'id'      => 'thumbnail'.$attachment[$i]['photo_dir'],
							'class'   => 'd-block img-fluid'
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



</div>
