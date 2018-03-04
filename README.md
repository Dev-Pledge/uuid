# DevPledge UUID Generator

This package is used to generate UUIDs with a prefix based on what the UUID is for.

Available entities:
* user
* problem
* pledge
* solution

# Usage
```
use \DevPledge\Uuid\Uuid;

echo UUID::make('user');
```