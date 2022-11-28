<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@pixelwond.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'email_verified_at' => '2022-03-15 10:28:34',
                'photo_path' => 'images/users/1727370207862851.webp',
                'role' => '1',
                'remember_token' => '3ZYRLlFa9sz5LuNnLBf5Y5XT53uLjAwXey0wmLHpEquN7BbzRq264X4I68IL',
                'created_at' => NULL,
                'updated_at' => '2022-03-15 18:57:38',
            ),
        ));
        
        
    }
}