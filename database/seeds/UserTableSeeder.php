<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'liushaoxing';
        $user->email = '79627084@qq.com';
        $user->password = bcrypt('123456789');
        $user->is_admin = true;
        $user->activated = true;
        $user->save();

    }
}
