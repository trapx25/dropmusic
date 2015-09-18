<?php

use DropMusic\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    /** @test */
    public function visit_as_guest_and_see_welcome_message()
    {
        $this->visit('/')
             ->see('Welcome');
    }

    /** @test */
    public function visit_as_member_with_a_dropbox_account_that_has_no_songs()
    {
        $user = User::find(1);

        $this->actingAs($user)
             ->visit('/')
             ->see('No MP3s');
    }

    /** @test */
    public function visit_as_member_with_no_dropbox_account()
    {
        $user = User::find(2);

        $this->actingAs($user)
             ->visit('/')
             ->see('No Dropbox Account');
    }

    /** @test */
    public function visit_as_member_with_a_dropbox_account_that_has_songs()
    {
        $user = User::find(3);

        $this->actingAs($user)
             ->visit('/')
             ->see('Playlist');
    }
}