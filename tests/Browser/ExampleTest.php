<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        // dd($this);


        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Laravel')
            ->assertSee('aaahello');
        });
    }
}