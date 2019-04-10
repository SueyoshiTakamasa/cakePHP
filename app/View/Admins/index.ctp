<?php $this->Html->addCrumb('記事の管理', '/admins'); ?>
<div class="row">

    <?php echo $this->element('admins/navi'); ?>

    <div class="col-sm-10 py-2 px-4" >
        <h4 class="border-bottom pt-1 pb-2">記事の管理</h4>

        <div class="mt-5">
            <table class="table  bg-white">
                <thead>
                    <tr class="fz-14">
                        <th>タイトル</th>
                        <th>作者</th>
                        <th>作成日時</th>
                        <th>カテゴリー</th>
                        <th>タグ</th>
                        <th></th>
                    </tr>
                </thead>

            <!-- ここで $posts 配列をループして、投稿情報を表示 -->
            <tbody>
                <?php foreach ($posts as $key => $post): ?>
                    <tr class="">


                        <!-- タイトル -->
                        <td>
                            <h5 class="font-weight-bold fz-14">
                            <?php
                                echo $this->Html->link(
                                    $post['Post']['title'],
                                    array(
                                        'controller' => 'posts',
                                        'action' => 'view',
                                        $post['Post']['id'],
                                    ),array(
                                        'class' => 'text-fb-blue'
                                    )
                                );
                            ?>
                            </h5>
                        </td>

                        <!-- タイトル -->
                        <td>
                            <span class="d-block fz-12">
                                 <?php echo h($post['User']['username']); ?>
                            </span>
                        </td>

                        <!-- 日にち -->
                        <td>
                            <span class="d-block text-muted fz-12">
                                <?php
                                    $explode = explode(" ", $post['Post']['created']);
                                    $split   = split("-", $explode[0]);
                                    $year    = $split[0];
                                    $month   = $split[1];
                                    $day     = $split[2];
                                    $time    = $explode[1];
                                ?>
                                <?php echo $year; ?>/
                                <?php echo $month; ?>/
                                <?php echo $day; ?>
                                <?php echo $time; ?>
                            </span>
                        </td>

                        <!-- カテゴリー -->
                        <td>
                            <span class="d-block fz-12">
                                <?php echo h($post['Category']['name']); ?>
                            </span>
                        </td>

                        <!-- タグ -->
                        <td>
                            <span class="d-block fz-14">
                                <?php foreach ($post['Tag'] as $tag): ?>
                                    <span class="badge border">
                                        <?php echo h($tag['name']."\n"); ?>
                                    </span>
                                <?php endforeach; ?>
                            </span>
                        </td>

                        <td>
                            <span class=" fz-12 btn btn-light px-2 py-1 border">
                                <?php
                                    echo $this->Html->link(
                                        '編集',
                                        array(
                                            'controller' => 'posts', 'action' => 'edit', $post['Post']['id']
                                        )
                                    );
                                ?>
                            </span>
                            <span class=" fz-12 btn btn-light px-2 py-1 border">
                                <?php
                                echo $this->Form->postLink(
                                    '削除',
                                    array(
                                        'controller' => 'posts',
                                        'action'     => 'delete',
                                         $post['Post']['id']
                                     ),
                                    array(
                                        'confirm'    => ' この記事を削除してよろしいいですか？',
                                    )
                                );
                                ?>
                            </span>
                        </td>

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

    </div>
</div>