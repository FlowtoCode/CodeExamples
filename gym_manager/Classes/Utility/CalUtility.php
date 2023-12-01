<?php

declare(strict_types=1);

namespace Florian\GymManager\Utility;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class CalUtility
{

    /**
     * @param int $week
     * @param int|null $year
     * @return array
     */
    public static function getRangeByWeeknumber(int $week, int $year = null): array
    {
        $year = $year ?? (int)date('Y');
        $dto = new \DateTime('today midnight');
        $dto->setISODate($year, $week);
        $ret['week_start'] = $dto->getTimestamp();
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->getTimestamp();
        return $ret;
    }

    public static function getCwContext(int $week, int $year)
    {
        if ($week === 1) {
            return [
                'previous' => [
                    'week' => 52,
                    'year' => $year - 1,
                ],
                'next' => [
                    'week' => $week + 1,
                    'year' => $year,
                ],
            ];
        }
        if ($week === 52) {
            return [
                'previous' => [
                    'week' => $week - 1,
                    'year' => $year,
                ],
                'next' => [
                    'week' => 1,
                    'year' => $year + 1,
                ],
            ];
        }
        return [
            'previous' => [
                'week' => $week - 1,
                'year' => $year,
            ],
            'next' => [
                'week' => $week + 1,
                'year' => $year,
            ],
        ];
    }

    public static function CourseList($startlist): array
    {
        for ($dayOfTheWeek = 1; $dayOfTheWeek <= 7; $dayOfTheWeek++) {
            for ($hourOfTheDay = 6; $hourOfTheDay <= 22; $hourOfTheDay++) {
                $tempCourses = [];

                if (!empty($startlist[$hourOfTheDay][$dayOfTheWeek])) {
                    foreach ($startlist[$hourOfTheDay][$dayOfTheWeek] as $course) {
                        $tempCourses[] = $course;
                    }
                }

                $calendar[$hourOfTheDay][$dayOfTheWeek] = $tempCourses;
            }
        }
        return $calendar;
    }
}
