<?php 
class Post extends AppModel {

    //
    //モデルの使用
    //
    public $actsAs = array('Search.Searchable');


    //
    //バリデーション
    //
    public $validate = array(
        'title' => array(
            'isOriginal' => array(
                'rule' => 'isOriginal',
                'message' => 'すでに同じタイトルがあります'
            ),
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'タイトルを入力してください'
            )
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

    //
    //アソシエーション
    //
    public $hasMany = array(
        'Attachment'=>array(
            'className'             =>'Attachment',
            'foreignKey'            =>'post_id',
            'dependent'             => true
        )
    );

    public $belongsTo = array(
		'Category'=>array(
			'className'             =>'Category',
			'foreignKey'            =>'category_id'
		),
		'User'=>array(
			'className'             =>'User',
			'foreignKey'            =>'user_id',
		),
	);

    public $hasAndBelongsToMany = array(
        'Tag'=>array(
            'className'             =>'Tag',
            'joinTable'             =>'posts_tags',
            'foreignKey'            =>'post_id',
            'associationForeignKey' =>'tag_id',
            'unique'                =>true,
            'with'                  =>'PostsTag',
        ),
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }


    //
    //バリデーション：ユーザー毎に同じタイトルの記事を複数作成できないようにする
    //
    public function isOriginal() {
        $postid     = Hash::get($this->data, 'Post.id');
        $posttitle  = Hash::get($this->data, 'Post.title');
        $userid     = Hash::get($this->data, 'Post.user_id');
        $conditions = [
            'Post.title'   => $posttitle,
            'Post.user_id' => $userid
        ];
        $not_postid  = [
            'NOT'          => [
                'Post.id'      => $postid
            ]
        ];

        //記事追加する時
        if($postid == null){
            return !$this->find('count', array(
                'conditions' => $conditions,
                'recursive' => -1)
            );
        } else{
        //記事編集する時。扱っている記事のidを除外してデータベースから情報を引っ張ってくる
            return !$this->find('count', array(
                'conditions' => [
                    $not_postid,
                    $conditions
                ],
                'recursive' => -1)
            );
        }
    }

    public function searchTagId($post = array()){

            if(isset($post['tag'])){
                //選ばれたタグの数で処理を分ける
                $tagIds = count($post['tag']);
                if($tagIds == 1) {
                    $posts = $this->PostsTag->find('all', array(
                                    'conditions' => array(
                                        'PostsTag.tag_id' => $post['tag']
                    )));

                    foreach($posts as $postItem){
                        $condition['or'][] = array(
                            'Post.id' => $postItem['PostsTag']['post_id']
                        );
                    }

                } elseif($tagIds > 1) {

                    foreach($post['tag'] as $tag_id){
                        $posts[] = $this->PostsTag->find('all', array(
                                        'conditions' => array(
                                            'PostsTag.tag_id' => $tag_id
                                        )
                        ));
                    }

                    debug($posts);
                    exit;

                    //それぞれの検索結果から同じpost_id値を持つ記事の抽出
                    $result = array();
                    foreach($posts[0] as $postItem_a) {
                        foreach($posts[1] as $postItem_b) {
                            if($postItem_a['PostsTag']['post_id'] === $postItem_b['PostsTag']['post_id']) {
                                $result[] = $postItem_b;
                            }
                        }
                    }


                    foreach($result as $postItem_c) {
                        $result[] = $postItem_c;
                    }


                    foreach($result as $postItem) {
                        $condition['or'][] = array(
                            'Post.id' => $postItem['PostsTag']['post_id']
                        );
                    }

                }

                // $group = array("PostsTag.post_id having count(PostsTag.tag_id) = " . $tagIds);
                // if(!empty($posts_tags_conditions)){
                //     $PostsTagItems = $this->PostsTag->find('all', array('conditions' => $posts_tags_conditions));
                //     $PostsTagItems = $this->PostsTag->find('all', array(
                //         'conditions' => $posts_tags_conditions,
                //         'group' => $group,
                //         )
                //     );
                //     foreach($PostsTagItems as $PostsTagItem){
                //         $conditions['or'][] = array('Post.id' => $PostsTagItem['PostsTag']['post_id']);
                //     }
                // }
            }
            return $condition;
    }

    //
    //検索条件設定
    //
    public $filterArgs = array(
        'title'=>array(
            'type'=>'like',
            'field'=>'Post.title',
            'allowEmpty'=>true,
        ),
        'category'=>array(
            'type'=>'like',
            'field'=>'Post.category_id',
            'allowEmpty'=>true,
        ),
        'tag'=>array(
            'type'=>'subquery',
            'field'=>'Post.id',
            'method'=>'searchTagId',
        )
    );



}
