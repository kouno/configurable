<?php 
/* SVN FILE: $Id$ */
/* Client Fixture generated on: 2009-09-18 16:24:56 : 1253305496*/

class ConfigurableUserFixture extends CakeTestFixture {
	var $name = 'ConfigurableUser';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'username' => array('type' => 'string', 'length' => 255, 'null' => false)
	);

	var $records = array(
		array(
			'id'  => 1,
			'username'  => 'admin'
		),
		array(
			'id'  => 2,
			'username'  => 'user1'
		),
		array(
			'id'  => 3,
			'username'  => 'user2'
		)
	);
}
