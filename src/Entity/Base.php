<?php

namespace App\Entity\App;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 * @JMS\ExclusionPolicy("all")
 */
abstract class Base {

    /**
     * isDeleted Time/Date 
     * @var \DateTime 
     * @ORM\Column(name="is_deleted", type="datetime", unique=false, nullable=true)
     */
    private $isDeleted;

    /**
     * created Time/Date 
     * @var \DateTime 
     * @ORM\Column(name="created_at", type="datetime", nullable=false) 
     */
    private $createdAt;

    /**
     * updated Time/Date 
     * @var \DateTime 
     * @ORM\Column(name="updated_at", type="datetime", nullable=false) 
     */
    private $updatedAt;

    /**
     * Set createdAt 
     * @ORM\PrePersist 
     */
    public function setCreatedAt() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get createdAt 
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt 
     * @ORM\PreUpdate 
     */
    public function setUpdatedAt() {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get updatedAt 
     * @return \DateTime 
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set isDeleted
     */
    public function setIsDeleted($isDeleted) {
        $this->isDeleted = $isDeleted;
        return $this;
    }

    /**
     * Get isDeleted
     * @return boolean
     */
    public function getIsDeleted() {
        return $this->isDeleted;
    }

}
