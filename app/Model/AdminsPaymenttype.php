<?php
App::uses('AppModel', 'Model');
/**
 * AdminsPaymenttype Model
 *
 * @property Admin $Admin
 * @property Paymenttype $Paymenttype
 */
class AdminsPaymenttype extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Admin' => array(
			'className' => 'Admin',
			'foreignKey' => 'admin_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Paymenttype' => array(
			'className' => 'Paymenttype',
			'foreignKey' => 'paymenttype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
