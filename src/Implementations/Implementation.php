<?php

declare(strict_types=1);

namespace PsrDiscovery\Implementations;

use PsrDiscovery\Collections\CandidatesCollection;
use PsrDiscovery\Contracts\Implementations\ImplementationContract;
use PsrDiscovery\Entities\CandidateEntity;

abstract class Implementation implements ImplementationContract
{
    protected static ?CandidatesCollection $candidates = null;

    /**
     * Return the candidates collection.
     */
    abstract public static function candidates(): CandidatesCollection;

    public static function add(CandidateEntity $candidate): void
    {
        static::$candidates ??= CandidatesCollection::create();
        static::candidates()->add($candidate);
    }

    public static function prefer(CandidateEntity $candidate): void
    {
        static::$candidates ??= CandidatesCollection::create();
        static::candidates()->prefer($candidate);
    }

    public static function set(CandidatesCollection $candidates): void
    {
        static::$candidates ??= CandidatesCollection::create();
        static::candidates()->set($candidates);
    }
}
