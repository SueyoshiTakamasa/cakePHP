<?php
App::uses('Employment', 'Model');

/**
 * Employment Test Case
 */
class EmploymentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Employment = ClassRegistry::init('Employment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Employment);

		parent::tearDown();
	}

}
