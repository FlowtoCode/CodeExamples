<?php

namespace Florian\GymManager\Domain\Model;

class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected string $name = '';

    protected string $street = '';

    protected string $city = '';

    protected string $zipcode = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser>
     */
    protected ?\TYPO3\CMS\Extbase\Persistence\ObjectStorage $users = null;

    /**
     * @return void
     */
    public function initializeObject(): void
    {
        $this->users = $this->users ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser> $users
     */
    public function getUsers(): ?\TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->users;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

}
