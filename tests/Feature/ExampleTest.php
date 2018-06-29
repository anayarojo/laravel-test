<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //Arrage | Preparation
        //Act | Action
        //Assert | Verification

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee("Raul Anaya");
    }

    public function testCanSearchForMessages()
    {
        $response = $this->get("/messages/?query=Alice");
        $response->assertSee("Alice");
    }
}
