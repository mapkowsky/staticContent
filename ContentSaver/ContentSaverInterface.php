<?php

/**
 * @author m.lewandowski4
 */
interface ContentSaverInterface {

	public function persist($object);

	public function flush();
}
