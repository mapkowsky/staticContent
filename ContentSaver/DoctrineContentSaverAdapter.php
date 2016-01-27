<?php

namespace StaticContent\ContentSaver;

/**
 * @author m.lewandowski4
 */
class DoctrineContentSaverAdapter implements ContentSaverInterface {

	private $em;

	public function __construct(Doctrine\ORM\EntityManager $em) {
		$this->em = $em;
	}

	public function persist($object) {
		$this->em->persist($object);
	}

	public function flush() {
		$this->em->flush();
	}

}
