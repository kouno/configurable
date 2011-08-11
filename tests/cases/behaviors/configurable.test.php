<?php

/**
 * Test cases for Configurable.
 *
 * @filesource
 * @author Vincent Bonmalais <vbonmalais@gmail.com>
 * @license	http://www.opensource.org/licenses/mit-license.php The MIT License
 * @package app.tests
 * @subpackage app.tests.cases.behaviors
 */

App::import('Behavior', 'Configurable.Configurable');

/**
 * Basic model to load Configurable.
 *
 * @package app.tests
 * @subpackage app.tests.cases.behaviors
 */
class ConfigurableUser extends CakeTestModel {
	public $actsAs = array('Configurable.Configurable');
}

/**
 * List of test cases for EnumerableBehavior.
 *
 * @package app.tests
 * @subpackage app.tests.cases.behaviors
 */
class ConfigurableTestCase extends CakeTestCase {

	/**
	 * List of fixtures.
	 *
	 * Use jobs
	 *
	 * @var mixed
	 * @access public
	 */
	var $fixtures = array('plugin.configurable.configurable_user', 'plugin.configurable.configuration');

	function startCase() {
		$this->Config =& new ConfigurableBehavior();
		$this->User =& new ConfigurableUser();
		$this->Config->setup($this->User, array());
		parent::startCase();
	}

	/**
	 * Test configuration.
	 */
	function testGetConfiguration() {
		/*
		 * Scenario 1:
		 * Given any model
		 * When a developer request a configuration variable
		 * Then it should return the associated value for this model
		 */
		$result = $this->Config->getConfig($this->User, 'threshold-1');
		$expected = true;
		$this->assertEqual($expected, $result);
	}
	
	/**
	 * Given a model
	 * When a developer is requesting all configuration variables
	 * Then it should return the associated values for this model.
	 */
	function testGetAllConfigurations() {
		$result = $this->Config->getAllConfig($this->User);
		$expected = array(
			'threshold-1' => true,
			'threshold-2' => 'test',
			'threshold-3' => array('key' => 'value'),
		);
		$this->assertEqual($expected, $result);
	}
	
	/**
	 * Given a model
	 * When a developer request the description for a variable
	 * Then it should return the associated description
	 */
	function testDescribeConfiguration() {
		$result = $this->Config->describeConfig($this->User, 'threshold-1');
		$expected = 'Description of threshold 1.';
		$this->assertEqual($result, $expected);
	}
}