<?php
// app/Model/User.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


class User extends AppModel {

    //
    //アソシエーション
    //
    public $hasMany = array(
        'Post'=>array(
            'className'=>'Post',
            'foreignKey'=>'user_id',
        ),
    );

    //
    //バリデーション
    //
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'isUnique',
                'message' => 'その名前はすでに使われています。'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('lengthBetween', 5, 15),
                'message' => '文字数が少なすぎます。'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
    
    //パスワードをハッシュ化
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}
}