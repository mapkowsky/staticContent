<?php

/**
 * Very primitive entity manager for mysqlli
 * @author m.lewandowski4
 */
class MysqlLiContentSaver implements ContentSaverInterface {
	
	private $objectsToFlush;
	
	private $conntection;
	
	public function __construct() {
		;
	}

	public function flush() {
		
	}

	public function persist($object) {
		
	}

}
