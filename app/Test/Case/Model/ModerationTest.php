<?php
App::uses('Moderation', 'Model');

/**
 * Moderation Test Case
 *
 */
class ModerationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.moderation',
		'app.user',
		'app.target'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Moderation = ClassRegistry::init('Moderation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Moderation);

		parent::tearDown();
	}

}
