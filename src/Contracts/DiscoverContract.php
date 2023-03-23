<?php

declare(strict_types=1);

namespace PsrDiscovery\Contracts;

interface DiscoverContract
{
    /**
     * Returns a PSR-6 Cache, or null if one cannot is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/cache-implementation
     *
     * @return null|\Psr\Cache\CacheItemInterface A PSR-6 Cache, or null if one cannot be found.
     */
    public static function cache(): ?object;

    /**
     * Returns a PSR-11 Container, or null if one cannot is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/container-implementation
     *
     * @return null|\Psr\Container\ContainerInterface A PSR-11 Container, or null if one cannot be found.
     */
    public static function container(): ?object;

    /**
     * Returns a PSR-14 Event Dispatcher, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/event-dispatcher-implementation
     *
     * @return null|\Psr\EventDispatcher\EventDispatcherInterface A PSR-14 Event Dispatcher, or null if one cannot be found.
     */
    public static function eventDispatcher(): ?object;

    /**
     * Returns a PSR-18 HTTP Client, or null if one is not found.
     *
     * Compatible providers: https://packagist.org/providers/psr/http-client-implementation
     *
     * @return null|\Psr\Http\Client\ClientInterface A PSR-18 HTTP Client, or null if one cannot be found.
     */
    public static function httpClient(): ?object;

    /**
     * Returns a PSR-17 HTTP Request factory, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/http-factory-implementation
     *
     * @return null|\Psr\Http\Message\RequestFactoryInterface A PSR-17 HTTP Request factory, or null if one cannot be found.
     */
    public static function httpRequestFactory(): ?object;

    /**
     * Returns a PSR-17 HTTP Response factory, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/http-factory-implementation
     *
     * @return null|\Psr\Http\Message\ResponseFactoryInterface A PSR-17 HTTP Response factory, or null if one cannot be found.
     */
    public static function httpResponseFactory(): ?object;

    /**
     * Returns a PSR-17 HTTP Stream factory, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/http-factory-implementation
     *
     * @return null|\Psr\Http\Message\StreamFactoryInterface A PSR-17 HTTP Stream factory, or null if one cannot be found.
     */
    public static function httpStreamFactory(): ?object;

    /**
     * Returns a PSR-3 Logger, or null if one is not found.
     *
     * Compatible libraries: https://packagist.org/providers/psr/log-implementation
     *
     * @return null|\Psr\Log\LoggerInterface A PSR-3 Logger, or null if one cannot be found.
     */
    public static function log(): ?object;
}
