<?php
/**
 * AlbumFixture
 *
 */
class AlbumFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'titre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'artiste_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'annee' => array('type' => 'date', 'null' => true, 'default' => null),
		'jaquette' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'categorie_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'creation' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modification' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'artiste_id' => array('column' => 'artiste_id', 'unique' => 0),
			'categorie_id' => array('column' => 'categorie_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'titre' => 'Lorem ipsum dolor sit amet',
			'artiste_id' => 1,
			'annee' => '2013-03-31',
			'jaquette' => 'Lorem ipsum dolor sit amet',
			'categorie_id' => 1,
			'user_id' => 1,
			'creation' => '2013-03-31 11:21:29',
			'modification' => '2013-03-31 11:21:29'
		),
	);

}
