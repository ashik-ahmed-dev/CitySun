<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'general',
                'value' => '{"app_url":"http:\\/\\/127.0.0.1:8000","site_name":"Suncity","site_title":"Suncity Contrary to popular belief, Lorem Ipsum is not simply random text.","newslatter_text":"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature .","about_text":"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.","copyright_text":"2022 \\u00a9 Citysun All Rights Reserved | Develop By Pixelwond Technology","address":"Kishoreganj 2300, Dhaka, Bangladesh","phone":"01914807645","email":"nirony731@gmail.com","facebook":"https:\\/\\/www.facebook.com\\/","twitter":"https:\\/\\/www.twitter.com\\/","instagram":"https:\\/\\/www.instragram.com\\/","youtube":"https:\\/\\/www.youtube.com\\/"}',
                'created_at' => '2022-03-15 12:15:39',
                'updated_at' => '2022-03-15 12:53:18',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'slider',
                'value' => '{"title":"CITYSUN","subtitle":"THE BEST SERVICE PROVIDER COMPANY"}',
                'created_at' => '2022-03-15 13:39:30',
                'updated_at' => '2022-03-15 13:49:52',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'websettings',
                'value' => '{"app_title":"Download Mobile Apps","play_store_url":"https:\\/\\/play.google.com\\/store","app_store_url":"https:\\/\\/www.apple.com\\/app-store\\/","app_sub_title":"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.","testi_title":"what client say","testi_subtitle":"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.","contact_title":"Stay Tuned","contact_subtitle":"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable."}',
                'created_at' => '2022-03-15 14:28:14',
                'updated_at' => '2022-03-15 16:27:01',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'about_text',
                'value' => '',
                'created_at' => '2022-03-15 16:42:58',
                'updated_at' => '2022-03-15 17:40:37',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'terms',
                'value' => '',
                'created_at' => '2022-03-15 18:31:31',
                'updated_at' => '2022-03-15 18:34:40',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'privacy',
                'value' => '',
                'created_at' => '2022-03-15 18:36:50',
                'updated_at' => '2022-03-15 18:38:03',
            ),
        ));
        
        
    }
}