<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewPostTest extends TestCase
{
    use DatabaseTransactions;

    public function testWrongParams() {
        $user = factory(App\User::class)
            ->make(['email' => 'test@user.laravel']);

        $this->be($user);

        $this->call(
            'POST',
            '/new',
            ['title' => 'the title', 'content' => 'ojhkjhg']
        );

        $this->assertSessionHasErrors('content');
        $this->assertHasOldInput();
    }

    public function testNewPost() {
        $user = factory(App\User::class)
            ->make(['email' => 'test@user.laravel']);
        $user->save();

        $this->be($user);

        $this->call(
            'POST',
            '/new',
            ['title' => 'the title', 'content' => 'In a place far far away.']
        );

        $this->assertRedirectedTo('http://localhost/new');
        $this->seeInDatabase(
            'posts',
            ['title' => 'the title', 'content' => 'In a place far far away.']
        );
    }
}
