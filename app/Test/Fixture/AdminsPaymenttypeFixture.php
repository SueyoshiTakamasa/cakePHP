<?php
/**
 * AdminsPaymenttype Fixture
 */
class AdminsPaymenttypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'admin_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'paymenttype_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'admin_id' => 1,
			'paymenttype_id' => 1,
			'created' => '2019-03-22 18:10:33',
			'modified' => '2019-03-22 18:10:33'
		),
	);

}
