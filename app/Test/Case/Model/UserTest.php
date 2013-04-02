<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.album',
		'app.artiste',
		'app.categorie',
		'app.musique',
		'app.category',
		'app.commentaire',
		'app.target',
		'app.favori',
		'app.message',
		'app.destinataire',
		'app.pj',
		'app.moderation',
		'app.note',
		'app.profil',
		'app.site',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
