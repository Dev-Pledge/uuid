# DevPledge UUID Generator

[![Build Status](https://travis-ci.org/Dev-Pledge/uuid.svg?branch=master)](https://travis-ci.org/Dev-Pledge/uuid)
[![Test Coverage](https://api.codeclimate.com/v1/badges/72d004733ec3f9f03748/test_coverage)](https://codeclimate.com/github/Dev-Pledge/uuid/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/72d004733ec3f9f03748/maintainability)](https://codeclimate.com/github/Dev-Pledge/uuid/maintainability)

This package is used to generate UUIDs with a prefix based on what the UUID is for.

Available entities:
* user
* problem
* pledge
* solution

# Usage
```
composer require dev-pledge/uuid
```
```
use \DevPledge\Uuid\Uuid;

echo UUID::make('user')->toString();
```

# Running tests
```
vendor/bin/phpunit
```