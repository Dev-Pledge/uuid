# DevPledge UUID Generator

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
