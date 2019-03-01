<div class="container">

<?php echo $this->element('search');?>
<div class="post-list mt-4">

<table class="table bg-white table-bordered">
    <tr class="bg-light">
        <th>Id</th>
        <th>タイトル</th>
        <th>カテゴリー</th>
        <th>タグ</th>
        <th>編集/削除</th>
        <th>作成日</th>
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
                <span class="badge badge-danger">
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

</div>

</div>