<?php
App::uses('Favori', 'Model');

/**
 * Favori Test Case
 *
 */
class FavoriTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.favori',
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
		$this->Favori = ClassRegistry::init('Favori');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Favori);

		parent::tearDown();
	}

}
