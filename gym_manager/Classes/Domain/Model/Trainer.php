<?php

namespace Florian\GymManager\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;

class Trainer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected string $firstname = '';

    /**
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected string $lastname = '';

    protected int $age = 0;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image = NULL;

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return FileReference|null
     */
    public function getImage(): ?FileReference
    {
        return $this->image;
    }
}
