<?php

namespace Florian\GymManager\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Location extends AbstractEntity
{

    /**
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected string $name = '';

    protected string $zipcode = '';

    protected string $city = '';

    protected string $street = '';

    protected string $description = '';

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image = NULL;

    /**
     * @return void
     */
    public function initializeObject(): void
    {
        $this->categories = $this->categories ?: new ObjectStorage();
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
    public function getZipcode(): string
    {
        return $this->zipcode;
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
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return FileReference|null
     */
    public function getImage(): ?FileReference
    {
        return $this->image;
    }
}
