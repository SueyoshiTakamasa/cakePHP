<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHPでブログを作る');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->css('colors');
		echo $this->Html->css('checkbox');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="bg-light">
		<div id="header" class="navbar navbar-dark bg-fb-blue justify-content-start">
			<h3 class="navbar-brand"><?php echo $this->Html->link('CakePHPでブログを作る',
				array(
					'controller' => 'posts',
					'action'     => 'index',
				),
				array(
					'class'      => 'text-white mr-auto'
				)
			); ?>
			</h3>
			<!-- ログインもしくはログアウト -->
			<?php
			if($login) {
				echo $this->Html->link('ログアウト', array(
				'controller' => 'users',
				'action'     => 'logout',
				),array(
				    'class' => 'btn text-white ml-auto',
				));

				if($url == '/' || preg_match('/Posts/',$url)){
					echo '<div class="btn text-white cur-po" id="toSearch">検索する</div>';
				}


				//記事を追加するページに遷移するボタン
				echo $this->Html->link('記事を追加する', array(
							'controller' => 'posts',
							'action'     => 'add',
							),array(
							    'class' => 'btn btn-fb',
							    'target' => '_blank'
				));
			}
			?>

		</div>

		<div id="content" class="pb-5 pt-4">

			<?php echo $this->Flash->render(); ?>

			<div class="container">
				<!-- パンくずリスト -->
				<?php if($url != '/users/login'){
					echo '<nav aria-label="breadcrumb mb-4">';
					echo '<ol class="breadcrumb">';
					echo '<li class="breadcrumb-item">';
					echo $this->Html->link(
				                'ホーム',
				                array(
				                    'action'  => 'index'
				                ),
				                array(
				                    'class'   => 'active'
				                )
				    );
				    echo '</li>';
				    echo '</ol>';
				    // echo $this->Html->getCrumbs();
				    echo '</nav>';
				} ?>


				<!-- 検索ボックス -->
				<?php echo $this->element('search');?>
			</div>


			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="bg-fb p-4">
<!-- 			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p> -->
			<?php
				echo $this->Html->link('タグ編集', array(
				'controller' => 'tags',
				'action'     => 'index',
				),array(
				    'class' => 'btn text-white ml-auto',
				));
			 ?>
			 <?php
				echo $this->Html->link('カテゴリー編集', array(
				'controller' => 'categories',
				'action'     => 'index',
				),array(
				    'class' => 'btn text-white ml-auto',
				));
			 ?>
			 <?php
				echo $this->Html->link('住所検索', array(
				'controller' => 'zipcodes',
				'action'     => 'index',
				),array(
				    'class' => 'btn text-white ml-auto',
				));
			 ?>
			<span class="text-center text-white d-block">
				&copy;クリエイター
			</span>
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<?php echo $this->Html->script('bundle'); ?>
</body>
</html>
