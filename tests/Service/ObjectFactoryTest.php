<?php

namespace PagueVeloz;

use TestCase;

class ObjectFactoryTest extends TestCase {

    protected $mock;

    public function setUp() {
        $this->mock = new ChildMockObjectFactory();
    }

    public function keys() {
        return ['field1','field2','field3','field4'];
    }

    public function attributes() {
        $keys = $this->keys();
        $attributes = [];
        foreach ($keys as $key) {
            $attributes[] = [ $key ];
        }
        return $attributes;
    }

    /**
     * @dataProvider attributes
     */
    public function testToArray($field) {
        $this->assertArrayHasKey($field, $this->mock->toArray());
    }
    
    /**
     * @dataProvider attributes
     */
    public function testToArrayHasArray($field) {
        $this->assertArrayHasKey($field, (array) $this->mock->toArray());
    }
    
    /**
     * @dataProvider attributes
     */
    public function testGetRequest($field) {
        $this->assertArrayHasKey($field, $this->mock->toArray());
    }
    
    public function testGetKeys() {
        $this->assertEquals($this->keys(), $this->mock->getKeys());
    }
}

/*
 * ChildMockObjectFactory
 */
class ChildMockObjectFactory extends ObjectFactory {
    public $field1;
    protected $field2;
    protected $field3;
    protected $field4;
    private $field5;
}
