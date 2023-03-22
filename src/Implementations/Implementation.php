<?php

namespace PsrDiscovery\Implementations;

use PsrDiscovery\Collections\CandidatesCollection;
use PsrDiscovery\Contracts\Implementations\ImplementationContract;
use PsrDiscovery\Discover;
use PsrDiscovery\Entities\CandidateEntity;

abstract class Implementation implements ImplementationContract
{
    protected static ?CandidatesCollection $candidates = null;
    protected static ?object $using = null;
    protected static ?object $singleton = null;

    abstract public static function candidates(): CandidatesCollection;

    public static function discover(): ?object {
        if (null !== static::$using) {
            return static::$using;
        }

        return Discover::httpClient();
    }

    public static function singleton(): ?object {
        if (null !== static::$using) {
            return static::$using;
        }

        return static::$singleton ??= static::discover();
    }

    public static function add(CandidateEntity $candidate): void {
        static::$candidates ??= static::candidates();
        static::$candidates->add($candidate);
        static::$singleton = null;
        static::$using = null;
    }

    public static function prefer(CandidateEntity $candidate): void {
        static::$candidates ??= static::candidates();
        static::$candidates->prefer($candidate);
        static::$singleton = null;
        static::$using = null;
    }

    public static function use(?object $instance): void {
        static::$singleton = $instance;
        static::$using = $instance;
    }

    public static function set(CandidatesCollection $candidates): void {
        static::$candidates = $candidates;
        static::$singleton = null;
        static::$using = null;
    }
}
