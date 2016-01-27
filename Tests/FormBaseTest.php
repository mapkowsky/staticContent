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
	
	public function testEditableForm(){
		$model = new \StaticContent\Model\StaticContent();
		$form = new \StaticContent\Form\EditableContentForm($model);
		$this->assertTrue($form->getModel()->getIsEditable());
	}
	
	public function testNonEditableForm(){
		$model = new \StaticContent\Model\StaticContent();
		$form = new \StaticContent\Form\NotEditableContentForm($model);
		$this->assertFalse($form->getModel()->getIsEditable());
		
	}
	
}
