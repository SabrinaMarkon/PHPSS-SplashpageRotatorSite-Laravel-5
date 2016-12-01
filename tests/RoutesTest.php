<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use App\Controllers\PagesController;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoutesExist()
    {
        $this->visit('/')
            ->see('Eagle Ads');

        $this->visit('about')
            ->see('About Us');

        $this->visit('join')
            ->see('Join Us');

        $this->visit('success')
            ->see('Thanks for Joining');

        $this->visit('login')
            ->see('Member Login');

        $this->visit('forgot')
            ->see('Forgot Your Login?');

        $this->visit('faqs')
            ->see('FAQ');

        $this->visit('terms')
            ->see('Terms');

        $this->visit('privacy')
            ->see('Privacy');

        $this->visit('support')
            ->see('Support');

        $this->visit('account')
            ->see('Welcome');

        $this->visit('profile')
            ->see('Update Account');

    }
}
