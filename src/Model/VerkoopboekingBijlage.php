<?php
/**
 * @author  IntoWebDevelopment <info@intowebdevelopment.nl>
 * @project SnelstartApiPHP
 */

namespace SnelstartPHP\Model;

use Ramsey\Uuid\UuidInterface;

class VerkoopboekingBijlage extends Bijlage
{
    /**
     * @var UuidInterface
     */
    private $verkoopBoekingId;

    public static $editableAttributes = [
        "verkoopBoekingId",
    ];

    public static function getEditableAttributes(): array
    {
        return \array_unique(
            \array_merge(parent::$editableAttributes, parent::getEditableAttributes(), static::$editableAttributes, self::$editableAttributes)
        );
    }

    public function getVerkoopBoekingId(): ?UuidInterface
    {
        return $this->verkoopBoekingId;
    }

    public function getVerkoopBoeking(): ?Verkoopboeking
    {
        if ($this->verkoopBoekingId === null) {
            return null;
        }

        return Verkoopboeking::createFromUUID($this->verkoopBoekingId);
    }

    public function setVerkoopBoekingId(UuidInterface $verkoopBoekingId): self
    {
        $this->verkoopBoekingId = $verkoopBoekingId;

        return $this;
    }
}