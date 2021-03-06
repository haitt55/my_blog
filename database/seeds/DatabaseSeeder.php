<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        $this->call(AppSettingTableSeeder::class);

        Model::reguard();
    }
}
