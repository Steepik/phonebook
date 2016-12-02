<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
            $this->visit('/111/edit')
                ->type('Taylor', 'name')
                ->type('Swift', 'lastname')
                ->type('Unknown', 'middlename')
                ->type('+334234235', 'tel')
                ->press('btnSave');

    }
}
