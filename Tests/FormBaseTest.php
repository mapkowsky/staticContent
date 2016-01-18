<?php
namespace StaticContent\Tests;

/**
 * @author m.lewandowski4
 */
class FormBaseTest extends \PHPUnit_Framework_TestCase {
	public function setUp() {
		parent::setUp();
		include '../Form/Base/Form.php';
		include '../Form/EditableContentForm.php';
		include '../Model/StaticContentInterface.php';
		include '../Model/StaticContent.php';
	}
	
	public function testIsEditable(){
		$model = new \StaticContent\Model\StaticContent();
		$form = new \StaticContent\Form\EditableContentForm($model);
		var_dump($form->getModel());
		$this->assertTrue($form->getModel()->getIsEditable());
	}
	
}
