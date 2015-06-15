<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /** @test */
    public function it_loads_the_home_page()
    {
        $this->visit('/')
             ->see('Landing Page');
    }

}
