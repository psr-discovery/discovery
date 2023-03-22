<?php

declare(strict_types=1);

namespace PsrDiscovery\Contracts\Implementations;

use PsrDiscovery\Collections\CandidatesCollection;
use PsrDiscovery\Entities\CandidateEntity;

interface ImplementationContract
{
    /**
     * Add a potential candidate to the discovery process.
     *
     * @param CandidateEntity $candidate The candidate to add.
     */
    public static function add(CandidateEntity $candidate): void;

    /**
     * Return the candidates collection.
     */
    public static function candidates(): CandidatesCollection;

    /**
     * Discover and instantiate a matching implementation.
     */
    public static function discover(): ?object;

    /**
     * Prefer a candidate over all others.
     *
     * @param CandidateEntity $candidate The candidate to prefer.
     */
    public static function prefer(CandidateEntity $candidate): void;

    /**
     * Override the discovery process' candidates collection with a new one.
     *
     * @param CandidatesCollection $candidates The new candidates collection.
     */
    public static function set(CandidatesCollection $candidates): void;

    /**
     * Return the singleton instance of the matching implementation.
     */
    public static function singleton(): ?object;

    /**
     * Use a specific implementation instance, overriding the discovery process.
     *
     * @param null|object $instance The instance to use.
     */
    public static function use(?object $instance): void;
}
