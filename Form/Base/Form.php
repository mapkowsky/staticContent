<?php
namespace StaticContent\Form\Base;

use StaticContent\Utils\HtmlRenderer;
/**
 * @author m.lewandowski4
 */
abstract class Form {
	
	const view_file_pattern = '../../View/Form/%s.html.php';
	
	private $model;
	
	private $request;
	
	private $action;
	
	/**
	 * @param object $model model to bind form data to
	 * @param string $action action where request with form data will be handled
	 * @throws \Exception
	 */
	public function __construct($model, $action = null){
		if(!is_object($model)){
			throw new \Exception("Model binded to form must be an object");
		}
		$this->model = $model;
		$this->action = $action;
	}
	
	/**
	 * @return string name of the form
	 */
	protected abstract function getName();
	
	/**
	 * @return string html ready to display
	 */
	public function render(){
		if(empty($this->getName())){
			throw new \Exception(sprintf("getName for class %s returns void", get_called_class()));
		}
		try{
			$file = sprintf(self::view_file_pattern, $this->getName());
			$renderer = new HtmlRenderer(array('model' => $this->model, 'action' => $this->action), $file);
			$html = $renderer->render();
		} catch (Exception $ex) {
			throw new Exception(sprintf("Template file not found for %s", $this->getName()));
		}
		return $html;
	}
	
	/**
	 * bind request to the form and hydrate to model
	 * @param array $request
	 */
	public function bindRequest($request){
		$this->request = $request;
		$this->hydrate();
	}
	
	private function hydrate(){
		foreach(get_class_methods($model::getClass) as $method){
			if(strpos('set', $method) === 0){
				$propertyName = ucfirst(str_replace('set', '', $method));
				if(isset($this->request[$propertyName])){
					$model->$method($this->request[$propertyName]);
				}
			}
		}
	}
	
}
