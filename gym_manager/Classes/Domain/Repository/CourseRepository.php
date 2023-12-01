<?php

declare(strict_types=1);

namespace Florian\GymManager\Domain\Repository;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\Exception;
use Florian\GymManager\Domain\Model\Gym;
use Florian\GymManager\Domain\Model\Course;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * The repository for Courses
 */
class CourseRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    // Filter by Category
    public function getFilterCoursesByCategory(Gym $gym, array $categories, int $rangeStart, int $rangeEnd)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'tx_gymmanager_domain_model_gym'
        );
        $queryCoursesFromGym = $queryBuilder
            ->select('courses')
            ->from('tx_gymmanager_domain_model_gym')
            ->where(
                $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($gym->getUid(), \PDO::PARAM_INT))
            )
            ->executeQuery();
        $coursesFromGym = $queryCoursesFromGym->fetchAssociative();

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'tx_gymmanager_domain_model_course'
        );

        $queryCourseDetail = $queryBuilder
            ->select('*')
            ->from('tx_gymmanager_domain_model_course')
            ->where(
                $queryBuilder->expr()->in('uid', $coursesFromGym['courses']),
                $queryBuilder->expr()->gte('coursestart', $queryBuilder->createNamedParameter($rangeStart)),
                $queryBuilder->expr()->lte('courseend', $queryBuilder->createNamedParameter($rangeEnd)),

            );

        if (!empty($categories)) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->in('categories', $categories),
            );
        }
        $result = $queryCourseDetail->executeQuery();

        return $result->fetchAllAssociative();
    }

    /**
     * @param bool $keysOnly
     * @return int[]|mixed[]|string[]
     * @throws DBALException
     * @throws Exception
     */
    public function getAllCategories(bool $keysOnly = false)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'tx_gymmanager_domain_model_category'
        );
        $statement = $queryBuilder
            ->select('uid', 'name')
            ->from('tx_gymmanager_domain_model_category')
            ->executeQuery();
        if ($keysOnly) {
            return array_flip($statement->fetchAllKeyValue());
        }
        return $statement->fetchAllKeyValue();
    }
}
