<?php

App::import('Model', 'Configure.Configuration');

/**
 * ConfigurableBehavior is a CakePHP behavior which allow to place constants in database.
 *
 * It creates a list of settings which could be loaded on application load and stocked in database.
 * (Pretty close to what would happen if these constants where defined in bootstrap...)
 *
 * Requirements list:
 * - This list of configurations should be available in database to be editable.
 * - This should be a default feature on any models of a project.
 * - It should provide a mechanism to cache all configuration at once, and to update the cache if necessary.
 *
 * @author Vincent Bonmalais
 */
class ConfigurableBehavior extends ModelBehavior {

	public $settings;
	private $__configurationList = array();
	
	public function setup(&$Model, $settings) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = array(
				'cache' => true,
				'cacheName' => 'default'
			);
		}
		$this->settings[$Model->alias] = array_merge(
			$this->settings[$Model->alias], (array) $settings
		);
	}
	
	/**
	 * 
	 * @param Model $Model
	 * @param string $name
	 */
	public function getConfig(&$Model, $name) {
		if (empty($this->__configurationList[$Model->alias])) {
			$this->__populateConf($Model);
		}
		return $this->__configurationList[$Model->alias][$name];
	}
	
	public function getAllConfig(&$Model) {
		if (empty($this->__configurationList[$Model->alias])) {
			$this->__populateConf($Model);
		}
		return $this->__configurationList[$Model->alias];
	}
	
	private function __populateConf(&$Model) {
		$configuration = ClassRegistry::init('Configure.Configuration');
		$confList = $configuration->find('list', array(
			'fields' => array('name', 'value'),
			'conditions' => array(
				'model' => $Model->alias
			),
			'recursive' => -1
		));
		array_walk($confList, array($this, '__unserializeConf'));
		$this->__configurationList[$Model->alias] = $confList;
		
	}
	
	private function __unserializeConf(&$item, $key) {
		$item = unserialize($item);
	}
	
	public function describeConfig(&$Model, $name) {
		$configuration = ClassRegistry::init('Configure.Configuration');
		$conf = $configuration->find('first', array(
			'fields' => array('description'),
			'conditions' => array(
				'model' => $Model->alias,
				'name' => $name
			),
			'recursive' => -1
		));
		return $conf['Configuration']['description'];
	}
}