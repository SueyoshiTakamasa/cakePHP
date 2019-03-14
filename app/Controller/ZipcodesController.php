<?php
App::uses('AppController','Controller');
class ZipcodesController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('search');
	}

	public function search(){
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$this->autoRender = false;

		if($this->request->is('ajax')) {
		    $result = $this->Zipcode->find('all',array(
			    'conditions'=>array(
			         'zipcode'=>$this->request->data['zipcode'],
				),
			));
		}

		return json_encode($result);
	}

	public function csvupload(){
			$file_temp_name = $this->request->data['Csv']['file']["tmp_name"];
			$file_name      = $this->request->data['Csv']['file']["name"];
		    if (is_uploaded_file($file_temp_name)
		      &&
		      ($fp = fopen($file_temp_name,'r')) !== false
		    ) {
			    //トランザクション管理用モデルを呼び出し
			    $this->loadModel('TransactionManager');
			    //トランザクション開始
			    $transaction = $this->TransactionManager->begin();

			    try{
			    	    //アップロードしたcsvファイルを配列に格納する<--ここから

			    	    //ファイルの保存先
			    	    $file_path  = Router::url($_SERVER["DOCUMENT_ROOT"].'/../Files/csv/');
			    	    $file   = $file_path.$file_name;

			    		if (move_uploaded_file($file_temp_name, $file)) {

			    		    chmod($file, 0644);

			    		    //zipcodesテーブルの中にあるデータを一旦削除
			    		    $truncate  = "TRUNCATE TABLE zipcodes;";
			    		    $this->Zipcode->query($truncate);

			    		    //文字コード設定をUTF-8にする
			    		    $setutf8   = "SET character_set_database=utf8;";
			    		    $this->Zipcode->query($setutf8);

			    		    //csvファイルをテーブルに挿入
			    		    $sql       = "LOAD DATA LOCAL INFILE "."'".$file."' ";
			    		    $sql      .= "INTO TABLE zipcodes ";
			    		    $sql      .= "FIELDS ";
			    		    $sql      .= "TERMINATED BY ',' ";
			    		    $sql      .= "OPTIONALLY ENCLOSED BY "."'".'"'."' ";
			    		    $sql      .= "ESCAPED BY '' ";
			    		    $sql      .= "LINES ";
			    		    $sql      .= "STARTING BY '' ";
			    		    $sql      .= "TERMINATED BY "."'".'\\'.'r\\'.'n'."' ";
			    		    $sql      .= "(jiscode,zipcode_old,zipcode,pref_kana,city_kana,street_kana,pref,city,street,flag1,flag2,flag3,flag4,flag5,flag6)";
			    		    $this->Zipcode->query($sql);

			    		    unlink($file_path.$file_name);
			    		    } else {
			    		       	$err_msg = "ファイルをアップロードできません。";
			    		    }

			    		    //モデルの処理がすべて上手くいったらコミット
			    		    $this->TransactionManager->commit($transaction);

			    		    //コミットまで終わったらフラッシュで編集の成功を知らせる
			    		    $this->Flash->success(__('CSVファイルは無事、アップロードされました'));
			    		    //indexへリダイレクト
			    		    // return $this->redirect(array('action' => 'index'));




			        }catch(Exception $e){
				        //失敗したらロールバック
				        $this->TransactionManager->rollback($transaction);
				        //フラッシュで知らせる
				        $this->Flash->error(__('Unable to update your post.'));
			    	}
		  	  }
	}

	public function index(){

		//csvファイルのアップロードボタンが押されたらcsvアップロードアクションが発動する。
		if(!empty($this->request->data['Csv'])){
			$this->csvupload();
		}

	}
}