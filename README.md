**Lightweight library that discovers available implementations by searching for a list of well-known classes that implement the relevant PSR interfaces, and returning an instance of the first one that is found.**

The library currently supports [PSR-18 HTTP Clients](https://www.php-fig.org/psr/psr-18/), [PSR-17 HTTP Factories](https://www.php-fig.org/psr/psr-17/), [PSR-14 Event Dispatchers](https://www.php-fig.org/psr/psr-14/), [PSR-11 Containers](https://www.php-fig.org/psr/psr-11/), [PSR-6 Cache](https://www.php-fig.org/psr/psr-6/) and [PSR-3 Loggers](https://www.php-fig.org/psr/psr-3/).

This is largely intended for inclusion in libraries like SDKs that wish to support PSR interfaces without requiring hard dependencies on specific implementations or demanding extra configuration by users.

-   [Requirements](#requirements)
-   [Installation](#installation)
    -   [PSR-18 HTTP Clients](#psr-18-http-clients)
    -   [PSR-17 HTTP Clients](#psr-17-http-clients)
    -   [PSR-14 Event Dispatchers](#psr-14-event-dispatchers)
    -   [PSR-11 Containers](#psr-11-containers)
    -   [PSR-6 Cache](#psr-6-cache)
    -   [PSR-3 Loggers](#psr-3-loggers)
-   [Handling Failures](#handling-failures)
-   [Exceptions](#exceptions)

## Requirements

-   PHP 8.0+
-   Composer 2.0+

The discovery of a particular interface requires the presence of a compatible implementation in the host application. This library does not install any implementations for you.

## Installation

You should install the appropriate dependencies from the list below for the PSRs you wish to have discovery support for.

### PSR-18 HTTP Clients

Installation:

```bash
composer require --dev psr-discovery/http-client-implementations
```

Usage:

```php
use PsrDiscovery\Discovery;

$httpClient = Discovery::httpClient();
```

Please see the [psr-discovery/http-client-implementations](https://github.com/psr-discovery/http-client-implementations) repository for a list of the supported library implementations. Pull requests are welcome to add support for additional libraries.

### PSR-17 HTTP Clients

Installation:

```bash
composer require --dev psr-discovery/http-factory-implementations
```

Usage:

```php
use PsrDiscovery\Discovery;

$requestFactory = Discovery::httpRequestFactory();
$responseFactory = Discovery::httpResponseFactory();
$streamFactory = Discovery::httpStreamFactory();
```

Please see the [psr-discovery/http-factory-implementations](https://github.com/psr-discovery/http-factory-implementations) repository for a list of the supported library implementations. Pull requests are welcome to add support for additional libraries.

### PSR-14 Event Dispatchers

Installation:

```bash
composer require --dev psr-discovery/event-dispatcher-implementations
```

Usage:

```php
use PsrDiscovery\Discovery;

$eventDispatcher = Discovery::eventDispatcher();
```

Please see the [psr-discovery/event-dispatcher-implementations](https://github.com/psr-discovery/event-dispatcher-implementations) repository for a list of the supported library implementations. Pull requests are welcome to add support for additional libraries.

### PSR-11 Containers

Installation:

```bash
composer require --dev psr-discovery/containers-implementations
```

Usage:

```php
use PsrDiscovery\Discovery;

$container = Discovery::container();
```

Please see the [psr-discovery/containers-implementations](https://github.com/psr-discovery/containers-implementations) repository for a list of the supported library implementations. Pull requests are welcome to add support for additional libraries.

### PSR-6 Cache

Installation:

```bash
composer require --dev psr-discovery/cache-implementations
```

Usage:

```php
use PsrDiscovery\Discovery;

$cache = Discovery::cache();
```

Please see the [psr-discovery/cache-implementations](https://github.com/psr-discovery/cache-implementations) repository for a list of the supported library implementations. Pull requests are welcome to add support for additional libraries.

### PSR-3 Loggers

Installation:

```bash
composer require --dev psr-discovery/log-implementations
```

Usage:

```php
use PsrDiscovery\Discovery;

$log = Discovery::log();
```

Please see the [psr-discovery/log-implementations](https://github.com/psr-discovery/log-implementations) repository for a list of the supported library implementations. Pull requests are welcome to add support for additional libraries.

## Handling Failures

If the library is unable to discover a suitable implementation, the relevant discovery method will simply return `null`. This allows you to handle the failure gracefully, for example by falling back to a default implementation.

Example:

```php
use PsrDiscovery\Discovery;

$httpClient = Discovery::httpClient();

if ($httpClient === null) {
    // No suitable HTTP Client implementation was discovered.
    // Fall back to a default implementation.
    $httpClient = new DefaultHttpClient();
}
```

## Exceptions

The library will expose a `PsrDiscovery\Exceptions\SupportPackageNotFoundException` when a discovery method is called, but the required support package is not installed.

---

This library is not produced or endorsed by, or otherwise affiliated with, the PHP-FIG.
