<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomePageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCanVisit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertUrlIs(route("home"))
                ->assertSee(config("app.name"))
                ->screenshot("Visit Homepage");
        });
    }
}
