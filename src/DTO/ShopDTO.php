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
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param array $settings
     */
    public function setSettings(array $settings): void
    {
        $this->settings = $settings;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string|null $uniqueId
     */
    public function setUniqueId(?string $uniqueId): void
    {
        $this->uniqueId = $uniqueId;
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
