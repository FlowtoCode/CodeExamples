<?php

namespace Florian\GymManager\Utility;

use Florian\GymManager\Domain\Model\Course;
use Florian\GymManager\Domain\Model\Gym;
use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;

class CourseUtility
{
    /*public function checkIfCourseHasEnoughMembers(Course $course): int
    {
        return (count($course->getUsers()) <= $course->getMinGroupSize() - 2);
    }*/

    public static function checkIfUserIsAssignable(int $userId, Course $course): int
    {
        if (self::checkIfUserIsAlreadyAttached($userId, $course)) {
            return 1656938360;
            //return 'This User has already been assigned to this course';
        }
        if (self::checkIfCourseIsLocked($course->getCoursestartStamp())) {
            return 1656938361;
            //return "Sign up 2 days prior to start time";
        }
        if (self::checkIfCourseHasEnoughMembers($course)){
            return 1656938362;
            //return "Course has not enough Members yet to start as intended";
        }
        if (self::checkIfCourseIsAlreadyFull($course)) {
            return 1656938363;
            //return "This course is already full";
        }
        return 0;
    }

    private static function checkIfUserIsAlreadyAttached(int $userId, Course $course): bool
    {
        foreach ($course->getUsers() as $member) {
            /** @var FrontendUser $member */
            if ($member->getUid() === $userId) {
                return true;
            }
        }
        return false;
    }

    private static function checkIfCourseIsLocked(int $courseTimestamp): bool
    {
        return ((time()) > $courseTimestamp - 178200);
    }

    private static function checkIfCourseHasEnoughMembers(Course $course) :bool
    {
        return (count($course->getUsers()) <= $course->getMinGroupSize() - 2);
    }

    private static function checkIfCourseIsAlreadyFull(Course $course): bool
    {
        return (count($course->getUsers()) >= $course->getMaxGroupSize());
    }

    public static function checkIfCurrentUserIsMemberOfGym(FrontendUser $user, Gym $gym): bool
    {
        /** @var FrontendUser $member */
        foreach ($gym->getUsers() as $member) {
            if ($member->getUid() === $user->getUid()) {
                return true;
            }
        }
        return false;
    }
}
