<?php
namespace StaticContent\Model;
/**
 * @author m.lewandowski4
 */
interface StaticContentInterface {
	
	public function getContent();
	
	public function setContent($content);
	
	public function getName();
	
	public function setName();
	
	public function getIsEditable();
	
	public function setIsEditable();
}
