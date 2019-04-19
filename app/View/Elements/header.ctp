<div id="header" class="bg-white d-flex align-items-center py-1 px-3">
	<?php echo $this->Html->link('心穏やかに1日を始める朝ごはん',
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
			if ($auth['role'] == 'admin') {
				echo '<span class="d-block mr-2">';
					echo $this->Html->link('記事を投稿する', array(
					'controller' => 'posts',
					'action'     => 'add',
					),array(
					   'class' => 'fz-12',
					   'target' => '_blank'
					));
				echo '</span>';
				echo '<div class="position-relative">';
					echo '<span class="fz-12 dropdownMenuButton cur-po">';
						echo '<i class="fas fa-user-circle mr-1"></i>'.$auth['username'].'<i class="fas fa-caret-down ml-1"></i>';
					echo '</span>';

					echo '<div class="dropdown-menu d-none border pt-2 px-2 position-absolute" style="right:0;">';
						echo '<ul class="list-unstyled">';
							echo '<li class="">';
								echo '<i class="fas fa-file-alt mr-1 text-secondary fz-12"></i>';
								echo $this->Html->link('記事の管理', array(
								'controller' => 'admins',
								'action'     => 'index',
								),array(
								    'class' => 'fz-12',
								));
							echo '</li>';
							echo '<li class="">';
							echo '<i class="fas fa-users mr-1 text-secondary fz-12"></i>';
								echo $this->Html->link('メンバー', array(
								'controller' => 'users',
								'action'     => 'index',
								),array(
								    'class' => 'fz-12',
								));
							echo '</li>';
							echo '<li class="">';
							echo '<i class="fas fa-folder mr-1 text-secondary fz-12"></i>';
								echo $this->Html->link('カテゴリー', array(
								'controller' => 'categories',
								'action'     => 'index',
								),array(
								    'class' => 'fz-12',
								));
							echo '</li>';
							echo '<li class="">';
							echo '<i class="fas fa-tag mr-1 text-secondary fz-12"></i>';
								echo $this->Html->link('タグ', array(
								'controller' => 'tags',
								'action'     => 'index',
								),array(
								    'class' => 'fz-12',
								));
							echo '</li>';
							echo '<li class="border-top mt-2">';
							echo '<i class="fas fa-sign-out-alt mr-1 text-secondary fz-12"></i>';
								echo $this->Html->link('ログアウト', array(
								'controller' => 'users',
								'action'     => 'logout',
								),array(
								    'class' => 'fz-12',
								));
							echo '</li>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			} elseif ($auth['role'] == 'author'){
				echo '<span class="d-block mr-2">';
					echo $this->Html->link('記事を投稿する', array(
					'controller' => 'posts',
					'action'     => 'add',
					),array(
					   'class' => 'fz-12',
					   'target' => '_blank'
					));
				echo '</span>';
				echo '<div class="position-relative">';
					echo '<span class="fz-12 dropdownMenuButton cur-po">';
						echo '<i class="fas fa-user-circle mr-1"></i>'.$auth['username'].'<i class="fas fa-caret-down ml-1"></i>';
					echo '</span>';

					echo '<div class="dropdown-menu d-none border pt-2 px-2 position-absolute" style="right:0;">';
						echo '<ul class="list-unstyled">';
							echo '<li class="">';
								echo '<i class="fas fa-file-alt mr-1 text-secondary fz-12"></i>';
								echo $this->Html->link('記事の管理', array(
								'controller' => 'admins',
								'action'     => 'index',
								),array(
								    'class' => 'fz-12',
								));
							echo '</li>';
							echo '<li class="border-top mt-2">';
							echo '<i class="fas fa-sign-out-alt mr-1 text-secondary fz-12"></i>';
								echo $this->Html->link('ログアウト', array(
								'controller' => 'users',
								'action'     => 'logout',
								),array(
								    'class' => 'fz-12',
								));
							echo '</li>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			} else {
				echo $this->Html->link('メンバー登録', array(
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