<?php
App::uses('Staff', 'Model');

/**
 * Staff Test Case
 *
 */
class StaffTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.staff',
		'app.position',
		'app.department'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Staff = ClassRegistry::init('Staff');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Staff);

		parent::tearDown();
	}

}
