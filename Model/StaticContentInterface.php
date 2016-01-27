<?php
namespace StaticContent\Model;
/**
 * @author m.lewandowski4
 */
interface StaticContentInterface {
	
	/**
	 * @return RevisionInterface the current version of the content
	 */
	public function getRevision();
	
	/**
	 * @param RevisionInterface $revision set the current version of the content
	 */
	public function setRevision($revision);
	
	public function getName();
	
	public function setName($name);
	
	public function getIsEditable();
	
	public function setIsEditable($isEditable);
	
}
