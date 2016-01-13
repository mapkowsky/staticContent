<?php

namespace StaticContent\Utils;

class NamespaceFinder {

	private $namespaceMap = [];
	private $defaultNamespace = 'global';

	public function __construct() {
		$this->traverseClasses();
	}

	private function getNameSpaceFromClass($class) {

		$reflection = new \ReflectionClass($class);
		return $reflection->getNameSpaceName() === '' ? $this->defaultNamespace : $reflection->getNameSpaceName();
	}

	public function traverseClasses() {
		$classes = get_declared_classes();

		foreach ($classes AS $class) {
			$namespace = $this->getNameSpaceFromClass($class);
			$this->namespaceMap[$namespace][] = $class;
		}
	}

	public function getNameSpaces() {
		return array_keys($this->namespaceMap);
	}

	public function getClassesOfNameSpace($namespace) {
		if (!isset($this->namespaceMap[$namespace]))
			throw new \InvalidArgumentException('The Namespace ' . $namespace . ' does not exist');

		return $this->namespaceMap[$namespace];
	}

}
