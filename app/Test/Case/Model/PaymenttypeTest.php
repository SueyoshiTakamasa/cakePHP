<?php
App::uses('Paymenttype', 'Model');

/**
 * Paymenttype Test Case
 */
class PaymenttypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paymenttype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Paymenttype = ClassRegistry::init('Paymenttype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Paymenttype);

		parent::tearDown();
	}

}
