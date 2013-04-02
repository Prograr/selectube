<?php
App::uses('Musique', 'Model');

/**
 * Musique Test Case
 *
 */
class MusiqueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.musique',
		'app.user',
		'app.artiste',
		'app.categorie',
		'app.album'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Musique = ClassRegistry::init('Musique');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Musique);

		parent::tearDown();
	}

}
