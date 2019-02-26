<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	//
	//’deleted’がコラムにあれば論理削除
	//

	//削除キーの定義
	public $deleted_name='deleted';
	public $deleted_date='deleted_date';

	function delete($id=null,$cascade=true){
	        if($this->_isDeletedField()){
	            if(empty($id)){$id=$this->id;}
	            $conditions=array();
	            $conditions['conditions']['AND'][$this->alias.'.'.$this->primaryKey] = $id;
	            $conditions['fields']=array($this->primaryKey,$this->deleted_name);
	            $conditions['recursive']=-1;
	            $data = $this->find('first',$conditions);
	            if(!empty($data)){
	                $data[$this->alias][$this->deleted_name]=1;
	                $data[$this->alias][$this->deleted_date]=date('Y-m-d H:i:s');

	                //hasOne,hasManyで繋がっていて、dependentがtrueの場合、その関連テーブルの関連データにdeleteメソッドを行う
	                $this->_deleteDependent($id, $cascade);
	                //hasAndBelongsToManyで繋がっている場合、その中間テーブルの関連データにdeleteメソッドを行う
	                $this->_deleteLinks($id);

	                return $this->save($data);
	            }else{
	                return false;
	            }
	        }else{
	            return parent::delete($id,$cascade);
	        }
	}
	//「削除キー」の有無確認
	function _isDeletedField(){return isset($this->_schema[$this->deleted_name]);}

}
