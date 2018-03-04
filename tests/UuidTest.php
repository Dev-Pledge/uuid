<?php

namespace DevPledge\Uuid\Test;

use PHPUnit\Framework\TestCase;
use DevPledge\Uuid\Uuid;
use DevPledge\Uuid\InvalidEntityException;


/**
 * Class UuidTest
 * @package DevPledge\Uuid\Test
 */
class UuidTest extends TestCase
{
    /**
     * @var []string
     */
    protected static $entities = [
        'user' => 'usr',
        'problem' => 'prb',
        'solution' => 'sol',
        'pledge' => 'plg',
    ];

    public function testEntityPrefix()
    {
        foreach (self::$entities as $entity => $prefix) {
            $uuid = Uuid::make($entity);
            self::assertStringStartsWith($prefix, $uuid);
            self::assertEquals(36  + strlen($prefix) + 1, strlen($uuid));
        }
    }

    public function testInvalidEntity()
    {
        $this->expectException(InvalidEntityException::class);
        Uuid::make('potato');
    }
}
