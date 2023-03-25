<?php

declare(strict_types=1);

namespace PsrDiscovery\Implementations;

use PsrDiscovery\Collections\CandidatesCollection;
use PsrDiscovery\Contracts\Implementations\ImplementationContract;
use PsrDiscovery\Entities\CandidateEntity;

abstract class Implementation implements ImplementationContract
{
    /**
     * Return potential candidates.
     */
    abstract public static function candidates(): CandidatesCollection;

    /**
     * Return all potential candidates, including those that cannot be instantiated automatically.
     */
    abstract public static function candidatesAll(): CandidatesCollection;

    public static function add(CandidateEntity $candidate): void
    {
        static::candidates()->add($candidate);
    }

    public static function prefer(string $package): void
    {
        static::candidates()->prefer($package);
    }

    public static function set(CandidatesCollection $candidates): void
    {
        static::candidates()->set($candidates);
    }
}
