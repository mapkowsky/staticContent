<?php
namespace StaticContent\Utils;

/**
 * @author m.lewandowski4
 */
class FormRegistry {
	
	private $forms;
	
	public function loadFormRegistry(){
		
	}
	
	public function getForm($name){
		$this->loadFormRegistry();
		if(!isset($this->forms[$name])){
			throw new \Exception(sprintf("Form with name %s not found", $name));
		} else {
			return $this->forms[$name];
		}
	}
}
