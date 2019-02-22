<?php
App::uses('AppController', 'Controller');

class ImagesController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function get() {
    	//画像データのみの表示にしたいのでいかを追加
    	$this->layout = false;
        $this->render(false);

    	//viewからRoutesに渡されたURLを取得
    	$path =  Router::url();

    	//'/'で分割
    	$explodedpath = explode("/",$path);

    	//5,6番目の値をそれぞれ変数に格納
    	$file_dir     = $explodedpath[5];
    	$file_name    = $explodedpath[6];

    	//画像の保存先を取得
        $file_path = Router::url($_SERVER["DOCUMENT_ROOT"].'/../Files/attachment/photo/');

        //取得したい画像のURLを変数に格納
        $file      = $file_path.$file_dir.DS.$file_name;

        //MIMEタイプを指定
        $mime_type = "image/jpeg";
        Header("Content-Type: $mime_type");

        //画像を読み込み
        readfile($file);

    }
}