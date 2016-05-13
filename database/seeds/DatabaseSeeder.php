<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        factory(App\Event::class, 20)->create();
        factory(App\Admin::class, 5)->create();

//        DB::table('admins')->insert([
//            'name'=>'admin',
//            'email'=>'admin',
//            'password'=>'admin'
//        ]);
    }
}
