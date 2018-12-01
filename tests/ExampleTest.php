<?php

class ExampleTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testSequenceGenerator()
    {
        $arr = [];
        for ($i = -1, $is = 70; ++$i < $is;)
        {
            array_push($arr, $i + 1);
        }
        shuffle($arr);
        foreach ($arr as $ar)
        {
            echo sprintf("%2d", intval($ar));
            echo "\n";
        }
    }

}
