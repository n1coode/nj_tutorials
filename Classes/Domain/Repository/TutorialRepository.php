<?php
namespace N1coode\NjTutorials\Domain\Repository;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class TutorialRepository extends \N1coode\NjTutorials\Domain\Repository\AbstractRepository
{
	/**
	 * Initializes the repository.
	 * @return void
	 * @see \TYPO3\CMS\Extbase\Persistence\Repository::initializeObject()
	 */
	public function initializeObject() 
	{
		parent::init('Tutorial');
	}
		
	
	/**
	 * @param int $limit Number of tutorials
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The tutorials
	 */
	public function findLatest($limit = 3)
	{
		$query = $this->createQuery();
		$query
			->setOffset(0)
			->setLimit($limit)
			->setOrderings(array('crdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
		
		$result = $query->execute();
		return $result;
	}
	
	
	/**
	 * @param int $category
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The tutorials
	 */
	public function findAllByCategory($category)
	{
		$query = $this->createQuery();
		$query->matching($query->equals('category', $category));
		$result = $query->execute();
		return $result;
	}
	
	
	/**
	 * @param int $offset
	 * @param int $limit
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The tutorials
	 */
	public function findAllInLimit($limit = 5, $offset = 0)
	{
		$query = $this->createQuery();
		$query
			->setOffset($offset)
			->setLimit($limit)
			->setOrderings(array('crdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
		
		$result = $query->execute();
		return $result;
	}
	
} //end of class \N1coode\NjTutorials\Domain\Repository\TutorialRepository
?>