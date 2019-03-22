<?php
App::uses('AdminsPaymenttype', 'Model');

/**
 * AdminsPaymenttype Test Case
 */
class AdminsPaymenttypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.admins_paymenttype',
		'app.admin',
		'app.shop',
		'app.paymenttype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AdminsPaymenttype = ClassRegistry::init('AdminsPaymenttype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdminsPaymenttype);

		parent::tearDown();
	}

}
