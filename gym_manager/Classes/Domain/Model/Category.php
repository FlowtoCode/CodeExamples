<?php

namespace Florian\GymManager\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Category extends AbstractEntity
{

    /**
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
