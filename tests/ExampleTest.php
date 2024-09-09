<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public function testDo_thing()
    {
        $example = new src\Example();
        $result = $example->do_thing(2, 2);
        $this->assertSame(4, $result);
    }

}