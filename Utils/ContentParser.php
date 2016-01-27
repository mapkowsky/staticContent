<?php

namespace StaticContent\Utils;

/**
 * @author m.lewandowski4
 */
class ContentRevisionManager {
	
	public static function prepareToSave($content){
		return strip_tags(self::escapeXSS($content), '<b><br><p><i><u><ul><li>');
	}
	
	private static function escapeXSS($content){
		return $content;
	}

}
