<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class UsersTest extends TestCase
{
    use DataBaseTransactions;
    use InteractsWithDatabase;

    public function testCanSeeUserPage()
    {
        //Arrage | Preparation
        $user = factory(User::class)->create();

        //Act | Action
        $response = $this->get("/users/$user->name");

        //Assert | Verification
        $response->assertSee($user->name);
    }

    public function testCanLogin()
    {
        //Arrage | Preparation
        $user = factory(User::class)->create();

        //Act | Action
        $response = $this->post("/login", [
            "email" => $user->email,
            "password" => "secret",
        ]);

        //Assert | Verification
        //$this->seeIsAuthenticatedAs($user);
        $this->assertAuthenticatedAs($user);
    }

    public function testCanFollow()
    {
        //Arrage | Preparation
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        //Act | Action
        $response = $this->actingAs($user)->post("/users/$other->username/follow");

        //Assert | Verification
        $this->assertDatabaseHas("followers", [
            "user_id" => $user->id,
            "followed_id" => $other->id,
        ]);
    }
}
