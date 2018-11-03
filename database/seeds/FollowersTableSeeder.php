<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all();
        $user = $users->first();

        // 获取除了id为1的所有用户
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();


        // id为1关注其它的用户
        $user->follow($follower_ids);


        // 关乎id为1的用户
        foreach ($followers as $follower){
            $follower->follow($user->id);
        }
    }
}
