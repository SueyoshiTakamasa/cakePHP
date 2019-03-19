<div class="container">

<div class="post-list mt-5 d-flex flex-wrap">


<!-- ここで $posts 配列をループして、投稿情報を表示 -->

    <?php foreach ($posts as $key => $post): ?>
        <div class="card m-1 shadow-sm" style="box-sizing:border-box; width:24.2%;">

            <!-- 画像 -->
            <?php echo '<img src="' ?>
            <?php
                        echo 'https://picsum.photos/300/200?random&dammy='.$key;
             ?>
             <?php echo '"alt="" class="card-img-top" >' ?>


            <div class="card-body">
            <!-- タイトル -->
            <h5 class="text-truncate font-weight-bold card-title">
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array(
                        'action' => 'view', $post['Post']['id']
                    ),
                    array(
                        'class'  => 'stretched-link card-title',
                    )
                );
            ?>
            </h5>

            <!-- カテゴリー -->
            <!-- <span class="d-block">
                <?php echo h($post['Category']['name']); ?>
            </span> -->

            <!-- 日にち -->
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

            <!-- タグ -->
            <span class="d-block">
                <i class="fas fa-tag text-muted"></i>
                <?php foreach ($post['Tag'] as $tag): ?>
                    <span class="badge badge-secondary">
                        <?php echo h($tag['name']."\n"); ?>
                    </span>
                <?php endforeach; ?>
            </span>

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
            </div>
        </div>
    <?php endforeach; ?>

</div>

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