<?php

namespace PsrDiscovery\Entities;

final class CandidateEntity
{
    public static function create(
        string $package,
        string $version,
        callable $builder,
    ): self {
        return new self($package, $version, $builder);
    }

    public function __construct(
        private string $package,
        private string $version,
        private callable $builder
    ) {}

    public function getPackage(): string
    {
        return $this->package;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @psalm-suppress MixedInferredReturnType,MixedReturnStatement
     */
    public function build(): object
    {
        return ($this->builder)();
    }

    public function __toString(): string
    {
        return $this->package . '@' . $this->version;
    }
}
