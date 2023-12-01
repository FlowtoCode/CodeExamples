<?php

declare(strict_types=1);

namespace Florian\GymManager\Controller;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\Exception;
use Florian\GymManager\Domain\Model\Course;
use Florian\GymManager\Domain\Model\Gym;
use Florian\GymManager\Domain\Repository\CourseRepository;
use Florian\GymManager\Utility\CalUtility;
use Florian\GymManager\Domain\Repository\GymRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;

class GymManagerController extends ActionController
{
    /**
     * @var CourseRepository|null
     */
    protected ?CourseRepository $courseRepository = null;

    /**
     * @param CourseRepository $courseRepository
     */
    public function injectCourseRepository(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * @var GymRepository|null
     */
    private ?GymRepository $gymRepository = null;

    /**
     * @param GymRepository $gymRepository
     */
    public function injectGymRepository(GymRepository $gymRepository)
    {
        $this->gymRepository = $gymRepository;
    }

    public function listAction()
    {
        $courses = $this->courseRepository->findAll();
        $gyms = $this->gymRepository->findAll();
        $this->view->assignMultiple([
            'gyms' => $gyms,
            'courses' => $courses,
        ]);
    }

    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function newAction(Gym $newGym = null): ResponseInterface
    {
        /** @var Gym $gym */

        return $this->htmlResponse();
    }

    public function createAction(Gym $newGym)
    {
        $this->gymRepository->add($newGym);
        $this->addFlashMessage('created');
        $this->redirect("list");
    }

    /**
     * @throws StopActionException
     * @throws IllegalObjectTypeException
     */
    public function deleteAction(Gym $gym)
    {
        $this->gymRepository->remove($gym);
        $this->redirect("list");
    }

    /**
     * @param Gym $gym
     */
    public function showAction(Gym $gym)
    {
        $this->view->assign(
            'gym', $gym
            );
    }

    public function addPictureAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * @throws DBALException
     * @throws Exception
     * @throws NoSuchArgumentException
     */
    public function calendarShowAction(Gym $gym): ResponseInterface
    {
        $courselist = [];
        $calUtility = new CalUtility();

        $categories = $this->courseRepository->getAllCategories(true);
        if ($this->request->hasArgument('categories')) {
            $categoryArgument = $this->request->getArgument('categories');
            if (is_array($categoryArgument)) {
                $categories = $categoryArgument;
                $this->view->assign('selectedCategories', $categories);
            }
        }

        $cw = ($this->request->hasArgument('cw')) ? (int)$this->request->getArgument('cw') : (int)date('W');
        $year = ($this->request->hasArgument('year')) ? (int)$this->request->getArgument('year') : (int)date('Y');
        $range = CalUtility::getRangeByWeeknumber($cw, $year);

        $coursesFromCategories = $this->courseRepository->getFilterCoursesByCategory(
            $gym,
            $categories,
            $range['week_start'],
            $range['week_end']
        );

        foreach ($coursesFromCategories as $courseArray) {
            /** @var Course $course */
            $course = $this->courseRepository->findByUid($courseArray['uid']);
            $courselist[getdate(strtotime($course->getCoursestartAsString()))['hours']][getdate(
                strtotime($course->getCoursestartAsString())
            )['wday']][] = [
                'name' => $course->getName(),
                'start' => $course->getCoursestartAsString(),
                'end' => $course->getCourseend(),
                'starthour' => $course->getStarthour(),
                'endhour' => $course->getEndhour(),
                'categorie' => $course->getCategories(),
                'location' => $course->getLocation()
            ];
        }

        /** @var Gym $gym */
        $gym = $this->gymRepository->findByUid($gym->getUid());

        $calendar = CalUtility::CourseList(
            $courselist
        );
        $this->view->assign('gym', $gym);
        $this->view->assign('courselist', $courselist);
        $this->view->assign('calendar', $calendar);
        $this->view->assign('calUtility', $calUtility);
        $this->view->assign('filters', $this->courseRepository->getAllCategories());
        $this->view->assignMultiple(
            [
                'cw' => $cw,
                'currentYear' => $year,
                'currentMonth' => date('M', $range['week_start']),
                'cwContext' => CalUtility::getCwContext($cw, $year),
            ]
        );
        return $this->htmlResponse();
    }

    public function aboutUsAction(Gym $gym): ResponseInterface
    {
        /** @var Gym $gym */
        $gym = $this->gymRepository->findByUid($gym->getUid());
        $this->view->assign('gym', $gym);
        return $this->htmlResponse();
    }

    public function trainersAction(Gym $gym): ResponseInterface
    {
        /** @var Gym $gym */
        $gym = $this->gymRepository->findByUid($gym->getUid());
        $this->view->assign('gym', $gym);
        return $this->htmlResponse();
    }

    public function mediaAction(Gym $gym): ResponseInterface
    {
        /** @var Gym $gym */
        $gym = $this->gymRepository->findByUid($gym->getUid());
        $this->view->assign('gym', $gym);
        return $this->htmlResponse();
    }
}
