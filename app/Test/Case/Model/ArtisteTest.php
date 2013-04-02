<?php
App::uses('Artiste', 'Model');

/**
 * Artiste Test Case
 *
 */
class ArtisteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.artiste',
		'app.categorie',
		'app.user',
		'app.album',
		'app.musique'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Artiste = ClassRegistry::init('Artiste');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Artiste);

		parent::tearDown();
	}

}
