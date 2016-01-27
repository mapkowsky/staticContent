<?php

use Doctrine\ORM\EntityManager;
use StaticContent\Form\Base\Form;
use StaticContent\ContentSaver\DoctrineContentSaverAdapter;
use StaticContent\ContentSaver\ContentSaverInterface;
use StaticContent\Model\RevisionInterface;

/**
 * @author m.lewandowski4
 */
class StaticContent {

	/**
	 * @var ContentSaverInterface 
	 */
	private $contentSaver;
	
	private $revisionModelClass;
	
	/**
	 * @param mixed $contentSaver ContentSaver should implement ContentSaverInterface or be an instance of doctrine's entity manager 
	 * @param string $revisionClass Name of revision model class
	 * @throws \Exception
	 */
	public function __construct($contentSaver = null, $revisionModelClass) {
		if(!class_exists($revisionModelClass)){
			throw new Exception("Revision model class does not exist");
		}
		if(!in_array('\StaticContent\Model\RevisionInterface', class_implements($revisionModelClass))){
			throw new Exception("Revision model should implement StaticContent\Model\RevisionInterface");
		}
		$this->revisionModelClass = $revisionModelClass;
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
	public function save(Form $form, $content) {
		/* @var $revision RevisionInterface */
		$revision = new $this->revisionModelClass();
		$revision->setContent($content);
		$number = (is_object($form->getModel()->getRevision())? $form->getModel()->getRevision()->getNumber() + 1 : 1);
		$revision->setNumber($number);
		$revision->setDateTime(new \DateTime());
		$revision->setUser($user);
		
	}

}
