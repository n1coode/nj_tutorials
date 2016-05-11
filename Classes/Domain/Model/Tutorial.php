<?php
namespace N1coode\NjTutorials\Domain\Model;

/**
 * A tutorial
 * @author n1coode
 * @package nj_tutorials
 */
class Tutorial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 * @var integer
	 */
	protected $commentsEnable;
	
	/**
	 * @var integer 
	 */
	protected $comments;

	/**
	 * @var integer
	 */
	protected $crdate;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\BackendUser
	 */
	protected $cruserId;
	
	/**
	 * @var string
	 */
	protected $description;
	
	/**
	 * @var \N1coode\NjTutorials\Domain\Model\Category
	 */
	protected $category;
	
	/**
	 * @var string
	 */
	protected $conclusion;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjCollection\Domain\Model\Content>
	 * @lazy
	 * @cascade remove
	 */
	protected $content;
	
	/**
	 * @var string
	 */
	protected $motivation;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjTutorials\Domain\Model\Tutorial>
	 * @lazy
	 * @cascade remove
	 */
	protected $relatedTutorials;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\N1coode\NjTutorials\Domain\Model\Tag>
	 * @lazy
	 * @cascade remove
	 */
	protected $tags;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $teaserImage;
	
	/**
	 * @var string
	 * @validate StringLength(minimum = 3, maximum = 255)
	 */
	protected $title;
	
	
	/* ***************************************************** */

	/**
	 * Constructs a new tutorial
	 * @return AbstractObject
	 */
	public function __construct() {

	}

	/* ***************************************************** */

	
	/**
	 * @return \N1coode\NjTutorials\Domain\Model\Category
	 */
	public function getCategory()
	{
		return $this->category;
	}
	
	/**
	 * @param \N1coode\NjTutorials\Domain\Model\Category $category
	 * @return void
	 */
	public function setCategory($category)
	{
		$this->category = $category;
	}

	
	
	/**
	 * @return integer
	 */
	public function getCommentsEnable()
	{
		return $this->commentsEnable;
	}
	
	/**
	 * @param integer $enable
	 * @return void
	 */
	public function setCommentsEnable($enable)
	{
		$this->commentsEnable = $enable;
	}
	
	
	/**
	 * @return integer
	 */
	public function getComments()
	{
		return $this->comments;
	}
	
	/**
	 * @param integer $comments
	 * @return void
	 */
	public function setComments($comments)
	{
		$this->comments = $comments;
	}
	
	
	/**
	 * @param string $conclusion
	 * @return void
	 */
	public function setConclusion($conclusion)
	{
		$this->conclusion = $conclusion;
	}
	
	/**
	 * @return string
	 */
	public function getConclusion()
	{
		return $this->conclusion;
	}
	
	
	/**
	 * Returns all content items of this tutorial
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getContent()
	{
		return $this->content;
	}
	
	
	/**
	 * @param int $crdate
	 * @return void
	 */
	public function setCrdate(int $crdate)
	{
		$this->crdate = $crdate;
	}
	
	/**
	 * @return int
	 */
	public function getCrdate()
	{
		return $this->crdate;
	}
	
	
	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\BackendUser
	 */
	public function getCruserId() 
	{
		return $this->cruserId;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\BackendUser $cruserId id of creator user
	 * @return void
	 */
	public function setCruserId(\TYPO3\CMS\Extbase\Domain\Model\BackendUser $cruserId) 
	{
		$this->cruserId = $cruserId;
	}
	
	
	
	/**
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}
	
	
	/**
	 * @param string $motivation
	 * @return void
	 */
	public function setMotivation($motivation)
	{
		$this->motivation = $motivation;
	}
	
	/**
	 * @return string
	 */
	public function getMotivation()
	{
		return $this->motivation;
	}
	
	
	/**
	 * @param \N1coode\NjTutorials\Domain\Model\Tutorial $relatedTutorial
	 * @return void
	 */
	public function addRelated(\N1coode\NjTutorials\Domain\Model\Tutorial $relatedTutorial) 
	{
		$this->relatedTutorials->attach($relatedTutorial);
	}
	
	/**
	 * @param \N1coode\NjTutorials\Domain\Model\Tutorial $relatedTutorial
	 * @return void
	 */
	public function removeRelated(\N1coode\NjPortfolio\Domain\Model\Tutorial $relatedTutorial) 
	{
		$this->relatedTutorials->detach($relatedTutorial);
	}
	
	/**
	 * @return void
	 */
	public function removeAllRelatedTutorials() 
	{
		$this->relatedTutorials = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getRelatedTutorials() 
	{
		return $this->relatedTutorials;
	}
	
	
	/**
	 * @param \N1coode\NjTutorials\Domain\Model\Tag $tag
	 * @return void
	 */
	public function addTag(\N1coode\NjTutorials\Domain\Model\Tag $tag) 
	{
		$this->tags->attach($tag);
	}
	
	/**
	 * @param \N1coode\NjTutorials\Domain\Model\Tag $tag
	 * @return void
	 */
	public function removeTag(\N1coode\NjTutorials\Domain\Model\Tag $tag) 
	{
		$this->tags->detach($tag);
	}
	
	/**
	 * @return void
	 */
	public function removeAllTags() 
	{
		$this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getTags() 
	{
		return $this->tags;
	}
	
	
	/**
	 * Setter for the teaser image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $teaserImage
	 * @return void
	 */
	public function setTeaserImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $teaserImage)
	{
		$this->teaserImage = $teaserImage;
	}
	
	/**
	 * Getter for the teaser image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	public function getTeaserImage()
	{
		return $this->teaserImage;
	}
	
	
	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

} //end of class N1coode\NjTutorials\Domain\Tutorial
?>