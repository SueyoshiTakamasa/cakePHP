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
        //記事追加する時
        if(empty($this->data['Post']['id'])){
            return !$this->find('count', array(
                'conditions' => array(
                    'Post.title'   => $this->data['Post']['title'],
                    'Post.user_id' => $this->data['Post']['user_id']
                ),
                'recursive' => -1)
            );
        } else{
        //記事編集する時。扱っている記事のidを除外してデータベースから情報を引っ張ってくる
            return !$this->find('count', array(
                'conditions' => array(
                    'Post.title'   => $this->data['Post']['title'],
                    'Post.user_id' => $this->data['Post']['user_id']
                ),
                'recursive' => -1)
            );
        }

    }


}
