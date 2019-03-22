<?php
App::uses('AppModel', 'Model');
/**
 * Admin Model
 *
 * @property Shop $Shop
 * @property Paymenttype $Paymenttype
 */
class Admin extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Shop' => array(
			'className' => 'Shop',
			'foreignKey' => 'shop_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Paymenttype' => array(
			'className' => 'Paymenttype',
			'joinTable' => 'admins_paymenttypes',
			'foreignKey' => 'admin_id',
			'associationForeignKey' => 'paymenttype_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
