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
	 * Content save should implement ContentSaverInterface or be an instance of doctrine's entity manager 
	 * @param mixed $contentSaver
	 * @throws \Exception
	 */
	public function __construct($contentSaver = null) {
		if ($contentSaver instanceof EntityManager) {
			$this->contentSaver = new DoctrineContentSaverAdapter($contentSaver);
		} elseif ($contentSaver instanceof ContentSaverInterface) {
			$this->contentSaver = $contentSaver;
		}
		elseif($contentSaver === null){
			/**
			 * Create mysqlli content saver here
			 */
			throw new \Exception("No default content saver yet.");
		} else {
			throw new \Exception("Invalid ContentSaver passed to StaticContent's constructor");
		}
	}

	/**
	 * @param \StaticContent\Form\Base\Form $name
	 * @param object $model
	 */
	public function getForm($name, $model) {
		$this->formRegistry->getForm($name, $model);
	}

	/**
	 * Saves the form's content
	 * @param Form $form
	 */
	public function save(Form $form) {
		$this->contentSaver->persist($form->getModel());
		$this->contentSaver->flush();
	}

}
