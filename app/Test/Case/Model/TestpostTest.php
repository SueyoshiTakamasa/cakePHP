<?php
App::uses('Testpost', 'Model');

/**
 * Testpost Test Case
 */
class TestpostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.testpost'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Testpost = ClassRegistry::init('Testpost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Testpost);

		parent::tearDown();
	}

}
