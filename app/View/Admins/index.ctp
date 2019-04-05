<div class="container">

<table class="table table-bordered">
    <thead>
        <tr class="fz-14">
            <th>タイトル</th>
            <th>作成日</th>
            <th>カテゴリー</th>
            <th>タグ</th>
        </tr>
    </thead>

<!-- ここで $posts 配列をループして、投稿情報を表示 -->
<tbody>
    <?php foreach ($posts as $key => $post): ?>
        <tr class="">


            <!-- タイトル -->
            <td>
                <h5 class="text-truncate font-weight-bold">
                <?php
                    echo $this->Html->link(
                        $post['Post']['title'],
                        array(
                            'action' => 'view', $post['Post']['id']
                        ),
                        array(
                            'class'  => 'stretched-link fz-14',
                        )
                    );
                ?>
                </h5>
            </td>

            <!-- 日にち -->
            <td>
                <span class="d-block text-muted fz-14">
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
            </td>

            <!-- カテゴリー -->
            <td>
                <span class="d-block fz-14">
                    <?php echo h($post['Category']['name']); ?>
                </span>
            </td>

            <!-- タグ -->
            <td>
                <span class="d-block fz-14">
                    <?php foreach ($post['Tag'] as $tag): ?>
                        <span class="badge badge-secondary">
                            <?php echo h($tag['name']."\n"); ?>
                        </span>
                    <?php endforeach; ?>
                </span>
            </td>

        <!-- <td>
            <?php
                echo $this->Html->link(
                    '編集する',
                    array(
                        'action' => 'edit', $post['Post']['id']
                    ),
                    array(
                        'class'  => 'btn btn-primary'
                    )
                );
            ?>
        </td> -->


        <!-- <td>
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
                        'class'      => 'btn btn-primary'
                    )
                );
                ?>
        </td> -->
        </tr>
    <?php endforeach; ?>
</tbody>

</table>

    <nav class="mt-4 d-block">
        <ul class="pagination justify-content-center">
            <?php
                echo $this->Paginator->numbers(array(
                    'first' => '', //ページ数が多いとき最初のページを出すか（数字で指定）
                    'last' => '',//ページ数が多いとき最後のページを出すか（数字で指定）
                    'before'=>'',//ページ番号の前に出力する文字を指定
                    'after'=>'',//ページ番号の後に出力する文字を指定
                    'modulus'=>'',//ページ番号を幾つ表示するか（デフォルト値：8）
                    'separator'=>'',//ページ番号を区切る文字列（デフォルト値：|）
                    'ellipsis'=>'',//省略される時に表示される文字列（デフォルト値：・・・）
                    'tag'=>'li',//ページ番号を囲むタグ（デフォルト値：設定無し）
                    'class'=>'page-link',//上記タグのクラス名を設定（デフォルト値：設定無し）
                    'currentTag'=>'',//表示中のページ番号のタグを設定（デフォルト値：null）
                    'currentClass'=>'text-secondary',
                ));
            ?>
        </ul>
    </nav>

</div>