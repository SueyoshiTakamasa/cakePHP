<?php 
class Post extends AppModel {

    //
    //バリデーション
    //
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
            'message' => '正しい値を入れてください'
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

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }


}
 ?>