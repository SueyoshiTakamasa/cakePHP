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

	public function index(){

		if (!empty($this->data)) {
			$file_temp_name = $this->request->data['Csv']['file']["tmp_name"];
			$file_name      = $this->request->data['Csv']['file']["name"];
		    if (is_uploaded_file($file_temp_name)
		      &&
		      ($fp = fopen($file_temp_name,'r')) !== false
		    ) {
		    	//アップロードしたcsvファイルを配列に格納する<--ここから

		    	//ファイルの保存先
		    	$file_path = Router::url($_SERVER["DOCUMENT_ROOT"].'/../Files/csv/');

			      if (move_uploaded_file($file_temp_name, $file_path.$file_name)) {
			                  chmod($file_path.$file_name, 0644);
			                  $msg = $file_name . "をアップロードしました。";
			                  $file = $file_path.$file_name;
			                  $fp = fopen($file, "r");

			                  //配列に変換する
			                  while (($data = fgetcsv($fp, 0, ",")) !== FALSE) {
			                    $asins[] = array(
			                    	'jiscode'      => $data[0],
			                    	'zipcode_old'  => $data[1],
			                    	'zipcode'      => $data[2],
			                    	'pref_kana'    => $data[3],
			                    	'city_kana'    => $data[4],
			                    	'street_kana'  => $data[5],
			                    	'pref'         => $data[6],
			                    	'city'         => $data[7],
			                    	'street'       => $data[8],
			                    	'flag1'        => $data[9],
			                    	'flag2'        => $data[10],
			                    	'flag3'        => $data[11],
			                    	'flag4'        => $data[12],
			                    	'flag5'        => $data[13],
			                    	'flag6'        => $data[14]
			                    );
			                  }
			                  fclose($fp);
			                  unlink($file_path.$file_name);
			       } else {
			       		$err_msg = "ファイルをアップロードできません。";
			       	}
			    //アップロードしたcsvファイルを配列に格納する<--ここまで

			    //トランザクション管理用モデルを呼び出し
			    $this->loadModel('TransactionManager');
			    //トランザクション開始
			    $transaction = $this->TransactionManager->begin();

			    try{
			    	$data = array(
			    		'Zipcode' => $asins
			    	);
				    // $data = array(
				    // 	'Zipcode' => array(
				    // 		0 => array(
				    // 			'jiscode'      => '01101',
				    // 			'zipcode_old'  => '060  ',
				    // 			'zipcode'      => '0600000',
				    // 			'pref_kana'    => 'ホッカイドウ',
				    // 			'city_kana'    => 'サッポロシチュウオウク',
				    // 			'street_kana'  => 'イカニケイサイガナイバアイ',
				    // 			'pref'         => '北海道',
				    // 			'city'         => '札幌市中央区',
				    // 			'street'       => '以下に掲載がない場合',
				    // 			'flag1'        => '0',
				    // 			'flag2'        => '0',
				    // 			'flag3'        => '0',
				    // 			'flag4'        => '0',
				    // 			'flag5'        => '0',
				    // 			'flag6'        => '0'
				    // 		),
				    // 		1 => array(
				    // 			'jiscode'      => '01102',
				    // 			'zipcode_old'  => '060  ',
				    // 			'zipcode'      => '0600001',
				    // 			'pref_kana'    => 'ホッカイドウ',
				    // 			'city_kana'    => 'サッポロシチュウオウク',
				    // 			'street_kana'  => 'イカニケイサイガナイバアイ',
				    // 			'pref'         => '北海道',
				    // 			'city'         => '札幌市中央区',
				    // 			'street'       => '以下に掲載がない場合',
				    // 			'flag1'        => '0',
				    // 			'flag2'        => '0',
				    // 			'flag3'        => '0',
				    // 			'flag4'        => '0',
				    // 			'flag5'        => '0',
				    // 			'flag6'        => '0'
				    // 		),
				    // 	)
				    // );


			        //全ての情報をセーブ
			        if($this->Zipcode->saveAll($data['Zipcode'])){
			            //モデルの処理がすべて上手くいったらコミット
			            $this->TransactionManager->commit($transaction);

			            //コミットまで終わったらフラッシュで編集の成功を知らせる
			            $this->Flash->success(__('Your post has been updated.'));
			            //indexへリダイレクト
			            // return $this->redirect(array('action' => 'index'));

			        }

			    }catch(Exception $e){
			        //失敗したらロールバック
			        $this->TransactionManager->rollback($transaction);
			        //フラッシュで知らせる
			        $this->Flash->error(__('Unable to update your post.'));
			    }
		  	  }

		}
	}
}