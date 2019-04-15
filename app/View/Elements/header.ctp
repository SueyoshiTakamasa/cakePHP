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
		<span class="text-white fz-12">
			<?php
				if ($auth) {
				echo '<i class="fas fa-user-circle mr-1"></i>'.$auth['username'].'<i class="fas fa-caret-down"></i>';
				}
			?>
		</span>
	<!-- ログインもしくはログアウト -->
	<div class="d-flex align-items-center">
		<?php
		if($login) {
			echo $this->Html->link('ログアウト', array(
			'controller' => 'users',
			'action'     => 'logout',
			),array(
			    'class' => 'btn text-white ml-auto fz-12',
			));

		} else {
			echo $this->Html->link('ユーザー登録', array(
			'controller' => 'users',
			'action'     => 'add',
			),array(
			    'class' => 'btn text-white ml-auto fz-12',
			));

			echo $this->Html->link('ログイン', array(
			'controller' => 'users',
			'action'     => 'login',
			),array(
			    'class' => 'btn text-white fz-12',
			));

		}
		?>
	</div>

</div>