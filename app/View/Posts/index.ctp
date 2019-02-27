<!-- File: /app/View/Posts/index.ctp -->
<h3>検索する</h3>
<?php
    echo $this->Form->create();
    echo $this->Form->input('タイトル', array(

            'div' => false

        )

    );

    echo $this->Form->input('カテゴリー', array(

            'div' => false,

        )

    );

    echo $this->Form->input('タグ', array(

            'div' => false,

            'multiple' => 'checkbox',

        )

    );

    echo $this->Form->end('検索する');
 ?>
<h3>記事一覧</h3>

<p><?php echo $this->Html->link('記事を追加する', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>category</th>
        <th>tag</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- ここで $posts 配列をループして、投稿情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo h($post['Category']['name']); ?>
        </td>
        <td>
            <?php foreach ($post['Tag'] as $tag): ?>
                <span class=tag--original>
                    <?php echo h($tag['name']."\n"); ?>
                </span>
            <?php endforeach; ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array(
                        'controller' => 'posts',
                        'action'     => 'delete',
                         $post['Post']['id']
                     ),
                    array(
                        'confirm'    => 'Are you sure?'
                    )
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>