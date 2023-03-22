<?php

declare(strict_types=1);

namespace PsrDiscovery;

use Composer\InstalledVersions as Composer;
use Composer\Semver\VersionParser as Version;
use PsrDiscovery\Entities\CandidateEntity;
use PsrDiscovery\Collections\CandidatesCollection;
use PsrDiscovery\Exceptions\PackageRequired;

final class Discover
{
    private const PSR_HTTP_CLIENT = '\Psr\Http\Client\ClientInterface';
    private const PSR_HTTP_RESPONSE_FACTORY = '\Psr\Http\Message\ResponseFactoryInterface';
    private const PSR_HTTP_REQUEST_FACTORY = '\Psr\Http\Message\RequestFactoryInterface';
    private const PSR_HTTP_STREAM_FACTORY = '\Psr\Http\Message\StreamFactoryInterface';
    private const PSR_EVENT_DISPATCHER = '\Psr\EventDispatcher\EventDispatcherInterface';
    private const PSR_CONTAINER = '\Psr\Container\ContainerInterface';
    private const PSR_CACHE = '\Psr\Cache\CacheItemPoolInterface';
    private const PSR_LOG = '\Psr\Log\LoggerInterface';

    /**
     * @var object[] $discovered
     */
    private static array $discovered = [];

    /**
     * @var CandidatesCollection[] $candidates
     */
    private static array $candidates = [];

    /**
     * Returns a PSR-18 HTTP Client, or null if one is not found.
     *
     * Compatible providers: https://packagist.org/providers/psr/http-client-implementation
     *
     * @return \Psr\Http\Client\ClientInterface|null A PSR-18 HTTP Client, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function httpClient(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr18\Clients';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-18 HTTP Client', 'psr-discovery/http-client-implementations');
        }

        self::$candidates[self::PSR_HTTP_CLIENT] ??= $$implementationsPackage::candidates();

        return self::discover(self::PSR_HTTP_CLIENT);
    }

    /**
     * Returns a PSR-17 HTTP Response factory, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/http-factory-implementation
     *
     * @return \Psr\Http\Message\ResponseFactoryInterface|null A PSR-17 HTTP Response factory, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function httpResponseFactory(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr17\ResponseFactories';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-17 HTTP Response Factory', 'psr-discovery/http-factory-implementations');
        }

        self::$candidates[self::PSR_HTTP_RESPONSE_FACTORY] ??= $$implementationsPackage::candidates();

        return self::discover(self::PSR_HTTP_RESPONSE_FACTORY);
    }

    /**
     * Returns a PSR-17 HTTP Request factory, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/http-factory-implementation
     *
     * @return \Psr\Http\Message\RequestFactoryInterface|null A PSR-17 HTTP Request factory, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function httpRequestFactory(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr17\RequestFactories';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-17 HTTP Request Factory', 'psr-discovery/http-factory-implementations');
        }

        self::$candidates[self::PSR_HTTP_REQUEST_FACTORY] ??= $$implementationsPackage::candidates();

        return self::discover(self::PSR_HTTP_REQUEST_FACTORY);
    }

    /**
     * Returns a PSR-17 HTTP Stream factory, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/http-factory-implementation
     *
     * @return \Psr\Http\Message\StreamFactoryInterface|null A PSR-17 HTTP Stream factory, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function httpStreamFactory(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr17\StreamFactories';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-17 HTTP Stream Factory', 'psr-discovery/http-factory-implementations');
        }

        self::$candidates[self::PSR_HTTP_STREAM_FACTORY] ??= $$implementationsPackage::candidates();

        return self::discover(self::PSR_HTTP_STREAM_FACTORY);
    }

    /**
     * Returns a PSR-14 Event Dispatcher, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/event-dispatcher-implementation
     *
     * @return \Psr\EventDispatcher\EventDispatcherInterface|null A PSR-14 Event Dispatcher, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function eventDispatcher(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr14\EventDispatchers';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-14 Event Dispatcher', 'psr-discovery/event-dispatcher-implementations');
        }

        self::$candidates[self::PSR_EVENT_DISPATCHER] ??= $$implementationsPackage::candidates();

        return self::discover(self::PSR_EVENT_DISPATCHER);
    }

    /**
     * Returns a PSR-11 Container, or null if one cannot is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/container-implementation
     *
     * @return \Psr\Container\ContainerInterface|null A PSR-11 Container, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function container(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr11\Containers';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-11 Container', 'psr-discovery/container-implementations');
        }

        self::$candidates[self::PSR_CONTAINER] ??= $implementationsPackage::candidates();

        return self::discover(self::PSR_CONTAINER);
    }

    /**
     * Returns a PSR-6 Cache, or null if one cannot is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/cache-implementation
     *
     * @return \Psr\Cache\CacheItemInterface|null A PSR-6 Cache, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function cache(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr6\Cache';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-6 Cache', 'psr-discovery/cache-implementations');
        }

        self::$candidates[self::PSR_CACHE] ??= $implementationsPackage::candidates();

        return self::discover(self::PSR_CACHE);
    }

    /**
     * Returns a PSR-3 Logger, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/log-implementation
     *
     * @return \Psr\Log\LoggerInterface|null A PSR-3 Logger, or null if one cannot be found.
     *
     * @psalm-suppress MixedMethodCall
     */
    public static function log(): ?object
    {
        $implementationsPackage = '\PsrDiscovery\Implementations\Psr3\Logs';

        if (! \class_exists($implementationsPackage)) {
            throw new PackageRequired('PSR-3 Logger', 'psr-discovery/log-implementations');
        }

        self::$candidates[self::PSR_LOG] ??= $implementationsPackage::candidates();

        return self::discover(self::PSR_LOG);
    }

    /**
     * Discover an interface implementation from a list of well-known classes.
     *
     * @param string $interface        The interface to discover.
     *
     * @return object|null The discovered implementation, or null if none could be found
     *
     * @psalm-suppress MixedInferredReturnType,MixedReturnStatement,MixedMethodCall
     */
    private static function discover(string $interface): ?object
    {
        // If we've already discovered an implementation, return it.
        if (isset(self::$discovered[$interface])) {
            return self::$discovered[$interface];
        }

        // If we don't have any candidates, return null.
        if (! isset(self::$candidates[$interface])) {
            return null;
        }

        // Try to find a candidate that satisfies the version constraints.
        foreach (self::$candidates[$interface]->all() as $candidate) {
            /** @var CandidateEntity $candidate */
            if (Composer::satisfies(new Version, $candidate->getPackage(), $candidate->getVersion())) {
                return self::$discovered[$interface] = $candidate->build();
            }
        }

        return null;
    }
}
