<?php

use Illuminate\Database\Seeder;
use LaravelForum\Discussion;
use LaravelForum\Reply;
use LaravelForum\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Moustafa Ahmed',
            'email' => 'mous.ahmed@outlook.com',
            'password' => bcrypt('123456'),
        ])->discussions()->save(factory(Discussion::class)->create());

        factory(User::class, 4)->create()->each(function ($user) {
            for ($i = 0; $i < 5; $i++) {
                $user->discussions()->save(factory(Discussion::class)->create());
            }
        })->each(function ($user) {
            for ($i = 0; $i < 10; $i++) {
                $user->replies()->save(factory(Reply::class)->create());
            }
        });


    }

}
