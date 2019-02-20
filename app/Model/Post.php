<?php 
class Post extends AppModel {

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
            'className'=>'Attachment',
            'foreignKey'=>'post_id',
            'dependent'=>true,
        )
    );
    
    public $belongsTo = array(
		'Category'=>array(
			'className'=>'Category',
			'foreignKey'=>'category_id'
		),
		'User'=>array(
			'className'=>'User',
			'foreignKey'=>'user_id',
		),
	);

    public $hasAndBelongsToMany = array(
        'Tag'=>array(
            'className'=>'Tag',
            'joinTable'=>'posts_tags',
            'foreignKey'=>'post_id',
            'associationForeignKey'=>'tag_id',
            'unique'=>true,
            'with'=>'PostsTag',
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


}
