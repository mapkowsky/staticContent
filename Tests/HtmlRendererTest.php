<?php

namespace StaticContent\Tests;


/**
 * @author m.lewandowski4
 */
class HtmlRendererTest extends \PHPUnit_Framework_TestCase {

	public function testBasicRender() {
		include('../Utils/HtmlRenderer.php');
		$file = dirname(__FILE__) . '/htmldrenderer/basicTestTemplate.html.php';
		file_put_contents($file, '<tag><?=$variable1?></tag>');
		$renderer = new \StaticContent\Utils\HtmlRenderer(
			array('variable1' => 'VAR1')
			, $file
		);
		$html = $renderer->render();
		$this->assertEquals($html, '<tag>VAR1</tag>');
	}

	protected function setUp() {
		parent::setUp();
		if (file_exists(dirname(__FILE__) . '/htmldrenderer')) {
			$files = glob(dirname(__FILE__) . '/htmldrenderer/*');
			foreach ($files as $file) {
				if (is_file($file))
					unlink($file);
			}
			rmdir(dirname(__FILE__) . '/htmldrenderer');
		}
		mkdir(dirname(__FILE__) . '/htmldrenderer');
	}

	protected function tearDown() {
		if (file_exists(dirname(__FILE__) . '/htmldrenderer')) {
			$files = glob(dirname(__FILE__) . '/htmldrenderer/*');
			foreach ($files as $file) {
				if (is_file($file))
					unlink($file);
			}
			rmdir(dirname(__FILE__) . '/htmldrenderer');
		}
	}

}
