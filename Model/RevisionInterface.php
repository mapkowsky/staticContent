<?php

namespace StaticContent\Model;

/**
 * Version of static content
 * @author m.lewandowski4
 */
interface RevisionInterface {

	/**
	 * Should return number of revision related to content  1... 2... 3...
	 */
	public function getNumber();

	public function getContent();

	/**
	 * @return BlameableUserInterface
	 */
	public function getUser();

	/**
	 * @return \DateTime
	 */
	public function getDateTime();

	/**
	 * Set number of revision related to content  1... 2... 3...
	 * @param $number integer
	 */
	public function setNumer($number);

	/**
	 * @param $content string
	 */
	public function setContent($content);

	/**
	 * @param \StaticContent\Model\BlameableUserInterface $user
	 */
	public function setUser(BlameableUserInterface $user);

	public function setDateTime(\DateTime $dateTime);
}
