<?php


namespace StaticContent\Utils;

/**
 * @author m.lewandowski4
 */
class FormFactory {
	
	const form_namespace_pattern = '\StaticContent\Form\%s';
	
	public function createForm($name, $model){
		$formClassName = sprintf(self::form_namespace_pattern, ucfirst($name));
		if(!class_exists($formClassName)){
			throw new \Exception(sprintf("Form %s not found", $formClassName));
		}
		if(!is_object($model)){
			throw new Exception("Form model should be an object");
		}
		return new $formClassName();
	}
}
