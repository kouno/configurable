<?php 
class ConfigurationFixture extends CakeTestFixture {
	var $name = 'Configuration';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'model' => array('type' => 'string', 'length' => 255, 'null' => false),
		'name' => array('type' => 'string', 'length' => 255, 'null' => false),
		'value' => array('type' => 'string', 'length' => 255, 'null' => false),
		'description' => array('type' => 'text'),
		'created' => 'datetime',
		'modified' => 'datetime'
	);

	var $records = array(
		array(
			'id'  => 1,
			'model' => 'ConfigurableUser',
			'name' => 'threshold-1',
			'value' => 'b:1;',
			'description' => 'Description of threshold 1.',
			'created' => '2011-07-18 00:00:00',
			'modified' => '2011-07-18 00:00:00'
		),
		array(
			'id'  => 2,
			'model' => 'ConfigurableUser',
			'name' => 'threshold-2',
			'value' => 's:4:"test";',
			'description' => 'Description of threshold 2.',
			'created' => '2011-07-18 00:00:00',
			'modified' => '2011-07-18 00:00:00'
		),
		array(
			'id'  => 3,
			'model' => 'ConfigurableUser',
			'name' => 'threshold-3',
			'value' => 'a:1:{s:3:"key";s:5:"value";}',
			'description' => 'Description of threshold 3.',
			'created' => '2011-07-18 00:00:00',
			'modified' => '2011-07-18 00:00:00'
		),
		array(
			'id'  => 4,
			'model' => 'ConfigurableGroup',
			'name' => 'threshold-1',
			'value' => 'b:0;',
			'description' => 'Description of threshold 1. (group)',
			'created' => '2011-07-18 00:00:00',
			'modified' => '2011-07-18 00:00:00'
		)
	);

}