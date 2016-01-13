<?php
namespace StaticContent\Utils;
/**
 * @author m.lewandowski4
 */
class HtmlRenderer {

	/**
	 * @var array
	 */
	private $vars;

	/**
	 * @var string 
	 */
	private $file;
	
	/**
	 * @param array $vars vars to be used while rendering
	 * @param type $file path to template file
	 */
	public function __construct($vars, $file) {
		$this->vars = $vars;
		if(!file_exists($file)){
			throw new \Exception(sprintf("Template file %s not found", $file));
		}
		$this->file = $file;
	}
	
	/**
	 * Rendered HTML
	 * @return string
	 */
	public function render() {
		if (is_array($this->vars) && !empty($this->vars)) {
			extract($this->vars);
		}
		ob_start();
		include $this->file;
		return ob_get_clean();
	}

}
