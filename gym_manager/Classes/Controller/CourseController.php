<?php

declare(strict_types=1);

namespace Florian\GymManager\Controller;

use Florian\GymManager\Domain\Model\Trainer;
use Florian\GymManager\Domain\Model\Course;
use Florian\GymManager\Domain\Model\Gym;
use Florian\GymManager\Domain\Repository\CourseRepository;
use Florian\GymManager\Domain\Repository\GymRepository;
use Florian\GymManager\Domain\Repository\TrainerRepository;
use Florian\GymManager\Utility\CourseUtility;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;
use TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException;

/**
 * CourseController
 */
class CourseController extends ActionController
{
    /**
     * @var CourseRepository|null
     */
    protected ?CourseRepository $courseRepository = null;

    /**
     * @var GymRepository|null
     */
    protected ?GymRepository $gymRepository = null;

    /**
     * @var FrontendUserRepository|null
     */
    protected ?FrontendUserRepository $frontendUserRepository = null;

    /**
     * @param Course $course
     * @param Gym $gym
     * @return ResponseInterface
     */
    public function showAction(Course $course, Gym $gym): ResponseInterface
    {
        $this->view->assign('gym', $gym);
        if (!empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
            /** @var FrontendUser $user */
            $user = $this->frontendUserRepository->findByUid($GLOBALS['TSFE']->fe_user->user['uid'] ?? 0);
            if (CourseUtility::checkIfCurrentUserIsMemberOfGym($user, $gym)) {
                $this->view->assign('isMember', true);
            }
        }
        $this->view->assign('course', $course);
        return $this->htmlResponse();
    }

    public function listAction()
    {
        $courses = $this->courseRepository->findAll();
        $gyms = $this->gymRepository->findAll();
        $this->view->assignMultiple([
            'gyms' => $gyms,
            'courses' => $courses,
        ]);
        return $this->htmlResponse();
    }

    /**
     * @param Course $course
     * @return ResponseInterface
     * @throws IllegalObjectTypeException
     * @throws UnknownObjectException
     */
    public function assignMemberAction(
        Course $course,
        Gym $gym
    ): ResponseInterface
    {
        /** @var FrontendUser $user */
        $user = $this->frontendUserRepository->findByUid($GLOBALS['TSFE']->fe_user->user['uid']);
        $checkResult = CourseUtility::checkIfUserIsAssignable($user->getUid(), $course);
        if ($checkResult === 0) {
            $course->addUser($user);
            $this->courseRepository->update($course);
        } else {
            if($checkResult === 1656938362){
                $course->addUser($user);
                $this->courseRepository->update($course);
                $course->setSignupMessage((int)$checkResult);
            }
            $course->setSignupMessage((int)$checkResult);
        }
        $this->view->assign('gym', $gym);
        $this->view->assign('course', $course);
        if (CourseUtility::checkIfCurrentUserIsMemberOfGym($user, $gym)) {
            $this->view->assign('isMember', true);
        }
        return $this->htmlResponse();
    }

    /**
     * @param CourseRepository $courseRepository
     */
    public function injectCourseRepository(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * @param GymRepository $gymRepository
     * @return void
     */
    public function injectGymRepository(GymRepository $gymRepository): void
    {
        $this->gymRepository = $gymRepository;
    }

    /**
     * @param FrontendUserRepository $frontUserRepository
     * @return void
     */
    public function injectUserRepository(FrontendUserRepository $frontUserRepository): void
    {
        $this->frontendUserRepository = $frontUserRepository;
    }
}
