<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    //
    //初期画面
    //
    public function index() {
        $this->set('posts', $this->Post->find('all'));
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

        if ($this->request->is(array('post', 'put'))) {
            //トランザクション管理用モデルを呼び出し
            $this->loadModel('TransactionManager');
            //トランザクション開始
            $transaction = $this->TransactionManager->begin();

            try{
                $this->request->data['Post']['user_id'] = $this->Auth->user('id');
                $this->Post->id = $id;

                //削除欄にチェックがあれば削除処理
                if(isset($this->request->data['Post']['Attachment'])){
                    $this->Post->Attachment->delete(
                        $this->request->data['Post']['Attachment']
                    );
                }

                //全ての情報をセーブ
                $this->Post->saveall($this->request->data);

                //モデルの処理がすべて上手くいったらコミット
                $this->TransactionManager->commit($transaction);
            }catch(Exception $e){
                //失敗したらロールバック
                $this->TransactionManager->rollback($transaction);
            }

            if ($this->Post->saveall($this->request->data)) {
                 $this->Flash->success(__('Your post has been updated.'));
                 return $this->redirect(array('action' => 'index'));
            } else {
                 $this->Flash->error(__('Unable to update your post.'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $post;
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