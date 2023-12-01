<?php

declare(strict_types=1);

namespace Florian\GymManager\Domain\Model;


use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


class Course extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected string $name = '';

    protected string $street = '';

    protected string $city = '';

    protected string $zipcode = '';

    protected string $description = '';

    protected int $price = 0;

    protected int $coursestart = 0;

    protected int $courseend = 0;

    protected string $coursestartAsString = '';
    protected string $courseendAsString = '';
    protected string $starthour = '';
    protected string $endhour = '';

    protected float $duration = 0;

    protected int $minGroupSize = 0;

    protected int $maxGroupSize = 0;
    protected int $signupMessage = 0;

    protected string $difficulty = '';

    protected int $location = 0;

    /**
     * @var ObjectStorage<Trainer>|null
     */
    protected ?ObjectStorage $trainers = null;

    /**
     * @var ObjectStorage<FrontendUser>|null
     */
    protected ?ObjectStorage $users = null;

    /**
     * @var ObjectStorage<Category>|null
     */
    protected ?ObjectStorage $categories = null;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image = null;

    /**
     * @return void
     */
    public function initializeObject(): void
    {
        $this->users = $this->users ?: new ObjectStorage();
        $this->categories = $this->categories ?: new ObjectStorage();
        $this->trainers = $this->trainers ?: new ObjectStorage();
    }

    /**
     * @return string $name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string $street
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string $city
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string $zipcode
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int $location
     */
    public function getLocation(): int
    {
        return $this->location;
    }

    /**
     * @return int $coursestartStamp
     */
    public function getCoursestartStamp()
    {
        return $this->coursestart;
    }

    /**
     * @return int
     */
    public function getCoursestart(): int
    {
        return $this->coursestart;
    }

    /**
     * @return int
     */
    public function getCourseend(): int
    {
        return $this->courseend;
    }

    /**
     * @return string $coursestart
     */
    public function getCoursestartAsString(): string
    {
        return \date('d-m-Y H:i',$this->coursestart);
    }

    /**
     * @return string $courseend
     */
    public function getCourseendAsString(): string
    {
        return \date('d-m-Y H:i',$this->courseend);
    }

    /**
     * @return string
     */
    public function getStarthour(): string
    {
        $this->starthour = \date('H:i' ,$this->coursestart);
        return $this->starthour;
    }

    /**
     * @return string
     */
    public function getEndhour(): string
    {
        $this->endhour = \date('H:i' ,$this->courseend);
        return $this->endhour;
    }

    /**
     * @return float $duration
     */
    public function getDuration(): float
    {
        $this->duration = ($this->courseend - $this->coursestart) / 3600;
        return $this->duration;
    }

    /**
     * @return ObjectStorage|null $users
     */
    public function getUsers(): ?ObjectStorage
    {
        return $this->users;
    }

    /**
     * @param FrontendUser $user
     * @return void
     */
    public function addUser(FrontendUser $user): void
    {
        $this->users->attach($user);
    }

    /**
     * @return ObjectStorage|null
     */
    public function getCategories(): ObjectStorage|null
    {
        return $this->categories;
    }

    /**
     * @return int $minGroupSize
     */
    public function getMinGroupSize(): int
    {
        return $this->minGroupSize;
    }

    /**
     * @return int $maxGroupSize
     */
    public function getMaxGroupSize() :int
    {
        return $this->maxGroupSize;
    }

    /**
     * @return int $price
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int $signupMessage
     */
    public function getSignupMessage(): int
    {
        return $this->signupMessage;
    }

    /**
     * @return string
     */
    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    /**
     * @return ObjectStorage|null $trainers
     */
    public function getTrainers():?ObjectStorage
    {
        return $this->trainers;
    }

    public function getImage(): ?FileReference
    {
        return $this->image;
    }
}
