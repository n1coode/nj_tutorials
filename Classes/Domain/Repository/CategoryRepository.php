<?php
namespace N1coode\NjTutorials\Domain\Repository;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class CategoryRepository extends \N1coode\NjTutorials\Domain\Repository\AbstractRepository
{
	/**
	 * Initializes the repository.
	 * @return void
	 * @see \TYPO3\CMS\Extbase\Persistence\Repository::initializeObject()
	 */
	public function initializeObject() 
	{
		parent::init('Category');
	}
	
	
	/**
	 * @param int $limit
	 * @return array The categories
	 */
	public function findRandom($limit = 5)
	{
		$query = $this->createQuery();
		$query->matching($query->equals('isSubcat', 0));
		
		$rows = $query->execute()->count();
		
		$tmpCategories = $query->execute()->toArray();
		
		$uids = [];
		foreach($tmpCategories as $category)
		{
			$uids[] = $category->getUid();
		}
		shuffle($uids);
		
		$categories = [];
		$x = 0;
		foreach($uids as $uid)
		{
			if($x === $limit) break;
			$categories[] = $this->findByUid($uid);
			$x++;
		}

		return $categories;
	}
	
} //end of class \N1coode\NjTutorials\Domain\Repository\CategoryRepository
?>