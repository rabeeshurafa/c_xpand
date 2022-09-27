<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Admin::create([
              'name'  => 'minesy',
              'email'  => 'minesy@gmail.com',
              'password'  => bcrypt('12345678'),
              'role_id'  => '1',

         ]);
    }
}
