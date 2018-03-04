<?php

namespace DevPledge\Uuid;

use Ramsey\Uuid\Uuid as Ruuid;

/**
 * Class Uuid
 * @package DevPledge\Uuid
 */
class Uuid
{
    protected static $entities = [
        'user' => 'usr',
        'problem' => 'prb',
        'solution' => 'sol',
        'pledge' => 'plg',
    ];

    /**
     * @param string $entity
     * @return string
     * @throws \DevPledge\Uuid\InvalidEntityException
     */
    public static function make($entity)
    {
        $uuid = Ruuid::uuid4()->toString();
        $prefix = self::getPrefix($entity);
        return "{$prefix}-{$uuid}";
    }

    /**
     * @param string $entity
     * @return mixed
     * @throws \DevPledge\Uuid\InvalidEntityException
     */
    protected static function getPrefix($entity)
    {
        if (!array_key_exists($entity, self::$entities)) {
            throw new InvalidEntityException("Invalid entity: {$entity}");
        }
        return self::$entities[$entity];
    }
}
