<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {


    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller') //     この行を追加しました
        )
    );

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // デフォルトは拒否
        return false;
    }

    //ログインしているかしていないか識別
    public function isLogined(){
        $user = $this->Auth->user();
        //ログインしていなかったらfalseを返す
        if(is_null($user)){
             return false;
        }else {
        //ログインしていればtrueを返す
            return true;
        }

        return false;
    }

    public function beforeFilter() {
        //ログインの有無を変数に格納
        $this->set('login',$this->isLogined());

        //ログイン中のユーザー名を変数に格納
        $this->set('auth', $this->Auth->user());

        $url = Router::url();

        $this->set('url', $url);
        $this->Auth->allow('index', 'view');
    }
}
