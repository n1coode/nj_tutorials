<?php
namespace N1coode\NjTutorials\Domain\Model;

/**
 * A category
 * @author n1coode
 * @package nj_tutorials
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	
	/**
	 * @var string
	 */
	protected $description;
	
	
	/**
	 * @var int
	 */
	protected $isSubcat;
	
	
	/**
	 * @var string
	 * @validate StringLength(minimum = 3, maximum = 255)
	 */
	protected $title;
	
	
	/**
	 * @var string
	 */
	protected $titleAlt;
	
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjTutorials\Domain\Model\Category>
	 */
	protected $mainCategory;
	
	
	
	/* ***************************************************** */

	/**
	 * Constructs a new artwork category
	 *
	 */
	public function __construct() {

	}

	/* ***************************************************** */

	
	/**
	 * Setter for the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	/**
	 * Getter for the description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}
	
	
	/**
	 * Getter for the main category
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjTutorials\Domain\Model\Category> $mainCategory
	 *
	 */
	public function getMainCategory()
	{
		return $this->mainCategory;
	}
	
	/**
	 * Setter for the main category
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjTutorials\Domain\Model\Category> $mainCategory
	 * @return void
	 */
	public function setMainCategory($mainCategory)
	{
		$this->mainCategory = $mainCategory;
	}
	
	
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
	
	
	/**
	 * Setter for the alternative title
	 *
	 * @param string $titleAlt
	 * @return void
	 */
	public function setTitleAlt($titleAlt)
	{
		$this->titleAlt = $titleAlt;
	}
	
	/**
	 * Getter for the alternative title
	 *
	 * @return string
	 */
	public function getTitleAlt()
	{
		return $this->titleAlt;
	}
	
	
} //end of class N1coode\NjTutorials\Domain\Model\Category
?>