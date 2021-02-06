<?php


namespace App\DTO;


class CategoryDTO extends BaseDTO
{
    protected ?int $id = null;
    protected ?string $title = null;
    protected ?string $description = null;
    protected ?string $subdescription = null;
    protected ?int $parentId = null;

    /**
     * @param int|null $id
     * @return $this
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param int|null $parentId
     * @return $this
     */
    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @param string|null $subdescription
     * @return $this
     */
    public function setSubdescription(?string $subdescription): self
    {
        $this->subdescription = $subdescription;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getSubdescription(): ?string
    {
        return $this->subdescription;
    }

    /**
     * @return CategoryDTO|null
     */
    public function getParentId(): ?CategoryDTO
    {
        return $this->parentId;
    }
}
