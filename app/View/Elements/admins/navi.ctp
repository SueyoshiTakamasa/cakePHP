<div class="col-sm-2 p-0 bg-light">
        <nav>
            <ul class='list-group p-0 fz-14'>
                <li class='list-group-item px-4 py-2 bg-light'>
                    <?php
                        echo $this->Html->link(
                            '記事の管理',
                            array(
                                'controller' => 'admins',
                                'action' => 'index',
                            ),
                            array(
                                'class' => 'stretched-link'
                            )
                        );
                    ?>
                </li>
                <li class='list-group-item px-4 py-2 bg-light'>
                    <?php
                        echo $this->Html->link(
                            'ユーザー',
                            array(
                                'controller' => 'users',
                                'action' => 'index',
                            ),
                            array(
                                'class' => 'stretched-link'
                            )
                        );
                    ?>
                </li>
                <li class='list-group-item px-4 py-2 bg-light'>
                    <?php
                        echo $this->Html->link(
                            'カテゴリー',
                            array(
                                'controller' => 'categories',
                                'action' => 'index',
                            ),
                            array(
                                'class' => 'stretched-link'
                            )
                        );
                    ?>
                </li>
                <li class='list-group-item px-4 py-2 bg-light'>
                    <?php
                        echo $this->Html->link(
                            'タグ',
                            array(
                                'controller' => 'tags',
                                'action' => 'index',
                            ),
                            array(
                                'class' => 'stretched-link'
                            )
                        );
                    ?>
                </li>
            </ul>
        </nav>
    </div>