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
	<div id="container" class="">
		<header>
			<div id="header" class="bg-fb-blue d-flex align-items-center py-1 px-2">
				<?php echo $this->Html->link('CakePHPでブログを作る',
					array(
						'controller' => 'posts',
						'action'     => 'index',
					),
					array(
						'class'      => 'text-white mr-auto d-block'
					)
				); ?>
				<!-- ログインもしくはログアウト -->
				<div class="d-flex align-items-center">
					<?php
					if($login) {
						echo $this->Html->link('ログアウト', array(
						'controller' => 'users',
						'action'     => 'logout',
						),array(
						    'class' => 'btn text-white ml-auto fz-14',
						));

						if($url == '/' || preg_match('/posts/',$url)){
							echo '<div class="btn text-white cur-po" id="toSearch">検索する</div>';
						}

					} else {
						echo $this->Html->link('ユーザー登録', array(
						'controller' => 'users',
						'action'     => 'add',
						),array(
						    'class' => 'btn text-white ml-auto fz-14',
						));

						echo $this->Html->link('ログイン', array(
						'controller' => 'users',
						'action'     => 'login',
						),array(
						    'class' => 'btn text-white fz-14',
						));

					}
					?>
				</div>

			</div>
		</header>

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
