<?php

namespace DevPledge\Uuid\Test;

use PHPUnit\Framework\TestCase;
use DevPledge\Uuid\Uuid;


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

    public function testMake()
    {
        $uuid = Uuid::make('user');
        self::assertInstanceOf(Uuid::class, $uuid);
        self::assertEquals('usr', $uuid->getPrefix());
        self::assertEquals(36, strlen($uuid->getUuid()));
    }

    public function testConstructor()
    {
        $uuid = new Uuid('1e0314d2-abd3-4b13-b5e1-d59d74e2382b', 'usr');
        self::assertEquals('usr', $uuid->getPrefix());
        self::assertEquals('1e0314d2-abd3-4b13-b5e1-d59d74e2382b', $uuid->getUuid());
        self::assertEquals('usr-1e0314d2-abd3-4b13-b5e1-d59d74e2382b', $uuid->toString());
    }

    public function testParsing()
    {
        $uuid = new Uuid('usr-1e0314d2-abd3-4b13-b5e1-d59d74e2382b');
        self::assertEquals('usr', $uuid->getPrefix());
        self::assertEquals('1e0314d2-abd3-4b13-b5e1-d59d74e2382b', $uuid->getUuid());
        self::assertEquals('usr-1e0314d2-abd3-4b13-b5e1-d59d74e2382b', $uuid->toString());
    }

    public function testParsingThrowsWhenNoPrefix()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Uuid('-1e0314d2-abd3-4b13-b5e1-d59d74e2382b');
    }

    public function testThrowsWhenInvalidUuidLength()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Uuid('11e0314d2-abd3-4b13-b5e1-d59d74e2382b', 'usr'); // Extra character (invalid UUID)
    }

    public function testThrowsWhenInvalidPrefix()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Uuid('1e0314d2-abd3-4b13-b5e1-d59d74e2382b', 'notaprefix');
    }

    public function testAllEntities()
    {
        foreach (self::$entities as $entity => $prefix) {
            $uuid = Uuid::make($entity)->toString();
            self::assertStringStartsWith($prefix, $uuid);
            self::assertEquals(36  + strlen($prefix) + 1, strlen($uuid));
        }
    }

    public function testInvalidEntity()
    {
        $this->expectException(\InvalidArgumentException::class);
        Uuid::make('potato');
    }
}
