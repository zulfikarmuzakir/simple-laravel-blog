<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Izumi Kyouka',
        	'email' => 'kyouka26@gmail.com',
        	'password' => bcrypt('kyouka26'),
            'admin' => 1
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpg',
            'about' => 'Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Nisi laboriosam ut ea iure adipisci molestiae obcaecati, minima soluta placeat quae sit saepe magni laborum neque, numquam inventore voluptate, perspiciatis non.',
            'facebook' => 'facebook.com',
            'twitter' => 'twitter.com',
            'instagram' => 'instagram.com'

        ]);
    }
}
