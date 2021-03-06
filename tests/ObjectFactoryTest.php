<?php

namespace PagueVeloz;

use TestCase;

class ObjectFactoryTest extends TestCase
{
    protected $mock;

    public function setUp()
    {
        parent::setUp();
        $this->mock = new ObjectFactorySub();
    }

    public function keysProvider()
    {
        return ['field1', 'field2', 'field3', 'field4'];
    }

    public function attributesProvider()
    {
        $keysProvider = $this->keysProvider();
        $attributesProvider = [];
        foreach ($keysProvider as $key) {
            $attributesProvider[] = [$key];
        }

        return $attributesProvider;
    }

    /**
     * @dataProvider attributesProvider
     */
    public function testIsset($field)
    {
        $this->mock->$field = $field;
        $this->assertTrue(isset($this->mock->$field));
    }

    /**
     * @dataProvider attributesProvider
     */
    public function testToArray($field)
    {
        $this->assertArrayHasKey($field, $this->mock->toArray());
    }

    /**
     * @dataProvider attributesProvider
     */
    public function testToArrayHasArray($field)
    {
        $this->assertArrayHasKey($field, (array) $this->mock->toArray());
    }

    /**
     * @dataProvider attributesProvider
     */
    public function testGetRequest($field)
    {
        $this->assertArrayHasKey($field, $this->mock->toArray());
    }

    public function testGetkeysProvider()
    {
        $this->assertEquals($this->keysProvider(), $this->mock->getKeys());
    }
}
