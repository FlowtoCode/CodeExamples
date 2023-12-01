<?php

namespace Florian\GymManager\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Gym extends AbstractEntity
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

    protected string $email = '';

    /**
     * @var ObjectStorage<Category>|null
     */
    protected ?ObjectStorage $availableCategories = null;

    /**
     * @var ObjectStorage<Course>|null
     */
    protected ?ObjectStorage $courses = null;

    /**
     * @var ObjectStorage<Event>|null
     */
    protected ?ObjectStorage $events = null;

    /**
     * @var ObjectStorage<Trainer>|null
     */
    protected ?ObjectStorage $trainers = null;

    /**
     * @var ObjectStorage<FrontendUser>|null
     */
    protected ?ObjectStorage $users = null;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image = NULL;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $ownerPic = NULL;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $staffPic = NULL;

    public function __construct($name = '',$street = '',$city = '',$zipcode = 0,$description = '', $email= '') {
        $this->setName($name);
        $this->setStreet($street);
        $this->setCity($city);
        $this->setZipcode($zipcode);
        $this->setDescription($description);
        $this->setEmail($email);

        $this->initializeObject();
    }

    /**
     * @return void
     */
    public function initializeObject() :void
    {
        $this->availableCategories = $this->availableCategories ?: new ObjectStorage();
        $this->courses = $this->courses ?: new ObjectStorage();
        $this->events = $this->events ?: new ObjectStorage();
        $this->users = $this->users ?: new ObjectStorage();
        $this->trainers = $this->trainers ?: new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return void
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return void
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     * @return void
     */
    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return ObjectStorage|null
     */
    public function getAvailableCategories(): ?ObjectStorage
    {
        return $this->availableCategories;
    }

    /**
     * @return ObjectStorage|null
     */
    public function getCourses(): ?ObjectStorage
    {
        return $this->courses;
    }

    /**
     * @return ObjectStorage|null
     */
    public function getEvents(): ?ObjectStorage
    {
        return $this->events;
    }

    /**
     * @return ObjectStorage|null
     */
    public function getTrainers(): ?ObjectStorage
    {
        return $this->trainers;
    }

    /**
     * @return ObjectStorage|null
     */
    public function getUsers(): ?ObjectStorage
    {
        return $this->users;
    }

    /**
     * @return FileReference|null
     */
    public function getImage(): ?FileReference
    {
        return $this->image;
    }

    /**
     * @return FileReference|null
     */
    public function getOwnerPic(): ?FileReference
    {
        return $this->ownerPic;
    }

    /**
     * @return FileReference|null
     */
    public function getStaffPic(): ?FileReference
    {
        return $this->staffPic;
    }
}
