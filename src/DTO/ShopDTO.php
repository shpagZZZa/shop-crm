<?php


namespace App\DTO;


class ShopDTO extends BaseDTO
{
    protected ?string $id = null;
    protected ?string $title = null;
    protected ?string $uniqueId = null;
    protected ?string $backendUrl = null;
    protected array $settings = [];

    /**
     * @param string|null $backendUrl
     */
    public function setBackendUrl(?string $backendUrl): void
    {
        $this->backendUrl = $backendUrl;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param array $settings
     * @return $this
     */
    public function setSettings(array $settings): self
    {
        $this->settings = $settings;
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
     * @param string|null $uniqueId
     * @return $this
     */
    public function setUniqueId(?string $uniqueId): self
    {
        $this->uniqueId = $uniqueId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBackendUrl(): ?string
    {
        return $this->backendUrl;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settings;
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
    public function getUniqueId(): ?string
    {
        return $this->uniqueId;
    }
}
