<?php
$this->Html->addCrumb('一覧ページ', '/');
$this->Html->addCrumb($post['Post']['title'], '');
?>
<!-- File: /app/View/Posts/view.ctp -->
<div class="container pt-4">
	<nav class="breadcrumb">
		<?php echo $this->Html->getCrumbs(
		); ?>
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


	<div class="mt-4 px-2 py-4 bg-white">
		<?php echo h($post['Post']['body']); ?>
	</div>

	<div class="action border py-2 px-1 mt-5">
		<?php
	        echo $this->Html->link(
	            '編集する',
	            array(
	                'action' => 'edit', $post['Post']['id']
	            ),
	            array(
	                'class'  => 'btn btn-fb--green'
	            )
	        );
	    ?>

	    <?php
	    echo $this->Form->postLink(
	        '削除する',
	        array(
	            'controller' => 'posts',
	            'action'     => 'delete',
	             $post['Post']['id']
	         ),
	        array(
	            'confirm'    => 'Are you sure?',
	            'class'      => 'btn btn-secondary'
	        )
	    );
	    ?>
	</div>

</div>
