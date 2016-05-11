<?php
namespace N1coode\NjTutorials\Domain\Model;

/**
 * A comment
 * @author n1coode
 * @package nj_tutorials
 */
class Comment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/**
	 *
	 * @var \N1coode\NjCollection\Domain\Model\User
	 */
	protected $author;

	/**
	 * @var string
	 * @validate NotEmpty
	 */
	protected $content;
	
	/**
	 * @var integer 
	 */
	protected $crdate;
	
	/**
	 * @var string
	 */
	protected $email;
	
	/**
	 * @var integer
	 */
	protected $foreignUid;

	/**
	 * @var string
	 */
	protected $foreignTable;
	
	/**
	 * @var string 
	 */
	protected $name;
	
	/**
	 * @var string 
	 */
	protected $url;
	
	
	/* ***************************************************** */

	/**
	 * Constructs a new artwork category
	 *
	 */
	public function __construct() {

	}

	/* ***************************************************** */
	

	/**
	 * @param \N1coode\NjCollection\Domain\Model\User $author
	 * @return void
	 */
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	
	/**
	 * @return \N1coode\NjCollection\Domain\Model\User
	 */
	public function getAuthor()
	{
		return $this->author;
	}
	
	
	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}
	
	
	/**
	 * @param string $content
	 * @return void
	 */
	public function setContent($content) 
	{
		$this->content = $content;
	}

	/**
	 * @return string The content
	 */
	public function getContent() 
	{
		return $this->content;
	}
	
	
	/**
	 * @param integer $crdate
	 * @return void
	 */
	public function setCrdate($crdate) 
	{
		$this->crdate = $crdate;
	}

	/**
	 * @return integer
	 */
	public function getCrdate() 
	{
		return $this->crdate;
	}
	
	
	/**
	 * Sets the foreign table
	 *
	 * @param string $foreignTable
	 * @return void
	 */
	public function setForeignTable($foreignTable) 
	{
		$this->foreignTable = $foreignTable;
	}

	/**
	 * Returns the foreign table
	 *
	 * @return string
	 */
	public function getForeignTable() 
	{
		return $this->foreignTable;
	}
	
	
	/**
	 * @param integer $foreignUid
	 * @return void
	 */
	public function setForeignUid($foreignUid) 
	{
		$this->foreignUid = $foreignUid;
	}

	/**
	 * @return integer
	 */
	public function getForeignUid() 
	{
		return $this->foreignUid;
	}
	
	
	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name)
	{
		$this->name = $name;
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	
	/**
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}
	
	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}
	
}
?>