<?php

use Doctrine\ORM\EntityManager;
use StaticContent\Form\Base\Form;
/**
 * @author m.lewandowski4
 */
class StaticContent {
	
	/**
	 * @var ContentSaverInterface 
	 */
	private $contentSaver;
	
	/**
	 * @var StaticContent\Utils\FormRegistry  
	 */
	private $formRegistry;
	
	public function __construct($contentSaver) {
		if($contentSaver instanceof EntityManager){
			$this->contentSaver = new DoctrineContentSaverAdapter($contentSaver);
		} elseif($contentSaver instanceof ContentSaverInterface){
			$this->contentSaver = $contentSaver;
		} else {
			throw new \Exception("Invalid ContentSaver passed to StaticContent's constructor");
		}
	}
	
	public function getForm($name){
		$this->formRegistry->getForm($name);
	}
	
	/**
	 * Saves the form's content
	 * @param Form $form
	 */
	public function save(Form $form){
		$this->contentSaver->persist($form->getModel());
		$this->contentSaver->flush();
	}
}
