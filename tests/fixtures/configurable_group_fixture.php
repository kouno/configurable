<?php

class ConfigurableGroupFixture extends CakeTestFixture {
	var $name = 'ConfigurableGroup';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'name' => array('type' => 'string', 'length' => 255, 'null' => false)
	);

	var $records = array(
		array(
			'id'  => 1,
			'name'  => 'admins'
		),
		array(
			'id'  => 2,
			'name'  => 'users'
		)
	);
}
