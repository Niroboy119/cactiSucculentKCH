<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_routeToHomepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200); 
        
    }




}
