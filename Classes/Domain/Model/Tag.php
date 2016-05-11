<?php
namespace N1coode\NjTutorials\Domain\Model;

/**
 * A tag
 * @author n1coode
 * @package nj_tutorials
 */
class Tag extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * @var string
	 * @validate StringLength(minimum = 3, maximum = 255)
	 */
	protected $title;
	
	
	/* ***************************************************** */

	/**
	 * Constructs a new artwork category
	 *
	 */
	public function __construct() {

	}

	/* ***************************************************** */
	
	
	/**
	 * Setter for the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * Getter for the title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
} //end of class N1coode\NjTutorials\Domain\Model\Tag
?>