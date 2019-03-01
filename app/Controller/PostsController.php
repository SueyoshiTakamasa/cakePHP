<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash','Search.Prg');
    // public $presetVars = true;
    public $presetVars = array(
        array(  'field'  => 'title',
                'type'   => 'value'
        ),
        array(  'field'  => 'category',
                'type'   => 'value'
        ),
        array(  'field'  => 'tag',
                'type'   => 'value'
        )
    );

    //
    //
    //
    public function beforeFilter() {
        // ページャ設定
        $pager_numbers = array(
          'before' => ' - ',
          'after'=>' - ',
          'modulus'=> 10,
          'separator'=> ' ',
          'class'=>'pagenumbers'
        );
        $this->set('pager_numbers', $pager_numbers);
      }

    //
    //初期画面
    //
    public function index() {
        $this->response->disableCache();
        $this->Prg->commonProcess();
        $conditions = $this->Post->parseCriteria($this->passedArgs);
        $this->set('posts', $this->Post->find('all' , array(
            'conditions' => array(
                'Post.deleted' => false,
                $conditions
            )
        )));

        //categoriesテーブルから種別テーブルリストを取得する
        $this->set('list',$this->Post->Category->find('list',array('fields'=>array('id','name'))));

        //tagsテーブルからリストを取得する
        $this->set('tag',$this->Post->Tag->find('list'));

    }

    //
    //投稿記事の詳細
    //
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post',$post);
    }

    //
    //記事を追加する
    //
    public function add() {

        if ($this->request->is('post')) {
            //Added this line
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->saveall($this->request->data)){

                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }

        //categoriesテーブルから種別テーブルリストを取得する
        $this->set('list',$this->Post->Category->find('list',array('fields'=>array('id','name'))));

        //tagsテーブルからリストを取得する
        $this->set('tag',$this->Post->Tag->find('list'));
    }


    //
    //投稿記事の編集
    //
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);

        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if (empty($this->request->data)) {
            $this->request->data = $post;
        } elseif($this->request->is(array('post', 'put'))) {
            // ここに保存のためのロジックを置く

            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->Post->id = $id;
            //トランザクション管理用モデルを呼び出し
            $this->loadModel('TransactionManager');
            //トランザクション開始
            $transaction = $this->TransactionManager->begin();

            try{
                //削除欄にチェックがあれば削除処理
                if(!empty($this->request->data['Post']['Attachment'])){

                    //IDを配列に格納
                    $array = $this->request->data['Post']['Attachment'];

                    //格納されたIDを一つずつdeleteメソッドに引数として渡す
                    foreach($array as $id){
                        $this->Post->Attachment->delete($id);
                    }

                }

                //全ての情報をセーブ
                if($this->Post->saveall($this->request->data)){
                    //モデルの処理がすべて上手くいったらコミット
                    $this->TransactionManager->commit($transaction);

                    //コミットまで終わったらフラッシュで編集の成功を知らせる
                    $this->Flash->success(__('Your post has been updated.'));
                    //indexへリダイレクト
                    return $this->redirect(array('action' => 'index'));

                }

            }catch(Exception $e){
                //失敗したらロールバック
                $this->TransactionManager->rollback($transaction);
                //フラッシュで知らせる
                $this->Flash->error(__('Unable to update your post.'));
            }

        }

        $this->set('list',$this->Post->Category->find('list'));
        $this->set('tag',$this->Post->Tag->find('list'));
        $this->set('attachment', $post['Attachment']);
        $this->set('photo' , $this->Post->Attachment->find('list', array(
            'conditions' => array(
                'Attachment.post_id' => $this->request->data['Post']['id'],
                'deleted'            => 0
            )
        )));

    }


   //
   //投稿記事の削除
   //
   public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Flash->success(
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

    //
    //権限に関して
    //

    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add') {
            return true;
        }
    
        // 投稿のオーナーは編集や削除ができる
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }



}