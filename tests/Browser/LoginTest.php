<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user=User::factory()->create();
            $browser->visit('/login')
                // ->assertSee('Laravel');
                ->type('email', $user->email) //type属性がemailの要素のもの(今回ではinputタグ)に＄user->emailと入力するという意味。
                ->type('password', 'password') //type属性がpasswordの要素のもの(今回ではinputタグ)に'password'と入力するという意味。
                ->press('LOG IN') //要素のコンテンツがLOG INである要素をクリックする。
                ->assertPathIs('/tweet') // /tweetに遷移したことを確認する。
                ->assertSee("呟きあぷり");
        });
    }
}