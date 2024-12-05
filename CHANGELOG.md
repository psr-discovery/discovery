# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.2.0] - 2024-12-05

### Changes

-   Catch exceptions from `Composer::satisfies` potentially thrown during `discoveries()` method calls, by [\@aidan-casey](https://github.com/aidan-casey) in [\#7](https://github.com/psr-discovery/discovery/pull/7).
-   Bump minimum supported PHP version to 8.2

## [1.1.2] - 2024-08-09

### Fixes

-   Address mismatch in classname for cache discovery by [\@reyostallenberg](https://github.com/reyostallenberg) in [\#6](https://github.com/psr-discovery/discovery/pull/6)

## [1.1.1] - 2024-03-04

### Changes

-   Bump minimum supported PHP version to 8.1

## [1.1.0] - 2024-03-04

### Changes

-   Add support for UploadedFileFactoryInterface and UriFactoryInterface by [\@flavioheleno](https://github.com/flavioheleno) in [\#4](https://github.com/psr-discovery/discovery/pull/4)

## [1.0.2] - 2023-03-27

### Fixes

-   Catch OutOfBoundsException thrown by `composer/semver` when no matching version is found.

## [1.0.1] - 2023-03-27

### Changes

-   Add `composer/semver` as production dependency.

## [1.0.0] - 2023-03-27

### Added

-   First release.
