<?php

use Illuminate\Database\Seeder;
use App\Models\AppSetting;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSetting::truncate();
        $appSettings = [
            [
                'key' => 'name',
                'value' => 'CMS',
            ],
            [
                'key' => 'company',
                'value' => 'HaiTT',
            ],
            [
                'key' => 'email',
                'value' => 'haitt55@gmail.com',
            ], [
                'key' => 'phone',
                'value' => '0945.880.668',
            ], [
                'key' => 'address',
                'value' => '333, My Dinh, Tu Liem District, Hanoi',
            ], [
                'key' => 'page_title',
                'value' => 'An awesome CMS!',
            ], [
                'key' => 'meta_keyword',
                'value' => 'awesome,cms',
            ], [
                'key' => 'meta_description',
                'value' => 'GCMS is an awesome CMS!',
            ], [
                'key' => 'latitude',
                'value' => '21.02163',
            ], [
                'key' => 'longitude',
                'value' => '105.79544',
            ]
        ];
        foreach ($appSettings as $appSetting) {
            AppSetting::create($appSetting);
        }
    }
}
