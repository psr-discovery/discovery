# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.0] - 2024-12-05

### Changes

-   Catch exceptions from `Composer::satisfies` potentially thrown during `discoveries()` method calls, by [\@aidan-casey](https://github.com/aidan-casey) in [\#7](https://github.com/psr-discovery/discovery/pull/7).
-   Bump minimum PHP version to 8.2

## [1.0.2] - 2023-03-27

### Fixes

-   Catch OutOfBoundsException thrown by `composer/semver` when no matching version is found.

## [1.0.1] - 2023-03-27

### Changes

-   Add `composer/semver` as production dependency.

## [1.0.0] - 2023-03-27

### Added

-   First release.
