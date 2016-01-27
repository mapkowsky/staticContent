<?php
namespace StaticContent\Model;

/**
 * @author m.lewandowski4
 */
class FOSUserAdapter implements BlameableUserInterface {
	
	private $fosUserEntity;
	
	/**
	 * @param \FOS\UserBundle\Model\UserInterface $fosUserEntity
	 * @throws \Exception
	 */
	public function __construct($fosUserEntity) {
		if(!is_object($fosUserEntity)){
			throw new \Exception("FOSUser Entity Object should be passed to the FOSUserAdapter's constructor");
		}
		if(!in_array('\FOS\UserBundle\Model\UserInterface', class_implements($forUserEntity::class))){
			throw new \Exception("FOSUser Entity Object should be passed to the FOSUserAdapter's constructor");
		}
		$this->fosUserEntity = $forUserEntity;
	}
	
	public function getUsername() {
		return $this->fosUserEntity->getUsername();
	}

	public function getId() {
		return $this->fosUserEntity->getId();
	}

}
