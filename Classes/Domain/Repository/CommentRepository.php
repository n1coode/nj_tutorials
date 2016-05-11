<?php
namespace N1coode\NjTutorials\Domain\Repository;

/**
 * @author n1coode
 * @package nj_tutorials
 */
class CommentRepository extends \N1coode\NjTutorials\Domain\Repository\AbstractRepository
{
	/**
	 * Initializes the repository.
	 * @return void
	 * @see \TYPO3\CMS\Extbase\Persistence\Repository::initializeObject()
	 */
	public function initializeObject() 
	{
		parent::init('Comment');
	}
	
	/**
	 * 
	 * @param string $foreignTable
	 * @param integer $foreignUid
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface The comments
	 */
	public function findMatchingForeignTableAndForeignUid($foreignTable, $foreignUid) 
	{
        $query = $this->createQuery();
        $query->matching(
			$query->logicalAnd(
				$query->equals('foreign_table', $foreignTable),
				$query->equals('foreign_uid', $foreignUid)
			)
        );
        return $query->execute();
	}
	
	
} //end of class \N1coode\NjTutorials\Domain\Repository\CategoryRepository
?>