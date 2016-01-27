<?php

namespace StaticContent\Model;

/**
 * Definition of static content
 * The real content is stored inside revision
 * @author m.lewandowski4
 */
class StaticContent implements \StaticContent\Model\StaticContentInterface {

	/**
	 * @var string
	 */
	private $revision;
	
	/**
	 * @var boolean
	 */
	private $isEditable;
	
	/**
	 * @var string
	 */
	private $name;
	
	public function setContent($content) {
		$this->content = $content;
	}

	public function setIsEditable($isEditable) {
		$this->isEditable = $isEditable;
	}
	
	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getIsEditable() {
		return $this->isEditable;
	}

	public function getRevision() {
		return $this->revision;
	}

	public function setRevision($revision) {
		$this->revision = $revision;
	}

}
