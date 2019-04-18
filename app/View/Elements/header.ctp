<div id="header" class="bg-white d-flex align-items-center py-1 px-3">
	<?php echo $this->Html->link('心穏やかにする朝ごはん',
		array(
			'controller' => 'posts',
			'action'     => 'index',
		),
		array(
			'class'      => 'mr-auto d-block ff-mincho fz-18'
		)
	); ?>

	<!-- ログインしているかどうかで表示させる情報を切り替え -->
	<div class="d-flex align-items-center">
		<?php
			if ($auth) {
				echo '<div class="position-relative">';
					echo '<span class="fz-12 dropdownMenuButton cur-po">';
						echo '<i class="fas fa-user-circle mr-1"></i>'.$auth['username'].'<i class="fas fa-caret-down"></i>';
					echo '</span>';

					echo '<div class="dropdown-menu d-none border py-2 px-2 position-absolute" style="right:0;">';
						echo '<ul class="list-unstyled">';
							echo '<li class="">';
								echo $this->Html->link('ログアウト', array(
								'controller' => 'users',
								'action'     => 'logout',
								),array(
								    'class' => 'ml-auto fz-12',
								));
							echo '</li>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			} else {
				echo $this->Html->link('ユーザー登録', array(
				'controller' => 'users',
				'action'     => 'add',
				),array(
				    'class' => 'btn ml-auto fz-12',
				));

				echo $this->Html->link('ログイン', array(
				'controller' => 'users',
				'action'     => 'login',
				),array(
				    'class' => 'fz-12',
				));
			}
		?>
	</div>

</div>