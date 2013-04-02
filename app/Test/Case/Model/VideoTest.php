<?php
App::uses('Video', 'Model');

/**
 * Video Test Case
 *
 */
class VideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video',
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
		'app.site'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Video = ClassRegistry::init('Video');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Video);

		parent::tearDown();
	}

}
