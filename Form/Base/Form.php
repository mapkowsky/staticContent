<?php
namespace StaticContent\Form\Base;

use StaticContent\Utils\HtmlRenderer;
use StaticContent\Model\StaticContentInterface;
/**
 * @author m.lewandowski4
 */
abstract class Form {
	
	const view_file_pattern = '../../View/Form/%s.html.php';
	
	private $model;
	
	private $action;
	
	/**
	 * @param object $model model to bind form data to
	 * @param string $action action where request with form data will be handled
	 * @throws \Exception
	 */
	public function __construct(StaticContentInterface $model, $action = null){
		if(!is_object($model)){
			throw new \Exception("Model binded to form must be an object");
		}
		$this->model = $this->prepareModel($model);
		$this->action = $action;
	}
	
	/**
	 * @return string name of the form
	 */
	protected abstract function getName();
	
	/**
	 * Perform operations on model here if needed
	 * must return the model object!
	 */
	protected abstract function prepareModel($model);


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
	 * @return StaticContentInterface
	 */
	public function getModel() {
		return $this->model;
	}

}
