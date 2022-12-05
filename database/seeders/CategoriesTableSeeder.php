<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'created_at' => '2022-12-03 14:13:37',
                'icon' => 'icon/Kbw6UfH2zNVlgrs6Q7Sp2cqDxo0G0phM9jhwrRqw.png',
                'id' => 1,
                'name' => 'Air-conditioner',
                'slug' => 'air-conditioner',
                'updated_at' => '2022-12-03 22:03:50',
            ),
            1 => 
            array (
                'created_at' => '2022-12-03 14:19:13',
                'icon' => 'icon/9NcjOJNIiGS5PFAGsWf0zxQKIMz7aRGiszWWcLAd.png',
                'id' => 2,
                'name' => 'Home Appliance',
                'slug' => 'home-appliance',
                'updated_at' => '2022-12-03 22:03:59',
            ),
            2 => 
            array (
                'created_at' => '2022-12-03 14:19:32',
                'icon' => 'icon/fwTkPN7urB6S3lLh12jfi9bXkMESbnccOSBJFSSX.png',
                'id' => 3,
                'name' => 'Cleaning Service',
                'slug' => 'cleaning-service',
                'updated_at' => '2022-12-03 22:04:08',
            ),
            3 => 
            array (
                'created_at' => '2022-12-03 14:19:55',
                'icon' => 'icon/JFzBJFlhuRzGsZmpP3rYXS6UPclKoOqloEfGgPwi.png',
                'id' => 4,
                'name' => 'Electronic Gadgets',
                'slug' => 'electronic-gadgets',
                'updated_at' => '2022-12-03 22:04:18',
            ),
            4 => 
            array (
                'created_at' => '2022-12-03 14:20:13',
                'icon' => 'icon/DE5oI3Iu6E2SQzPiyPig12s3aTAIsw0lPm92joTM.png',
                'id' => 5,
                'name' => 'Building Solution',
                'slug' => 'building-solution',
                'updated_at' => '2022-12-03 22:04:28',
            ),
            5 => 
            array (
                'created_at' => '2022-12-03 14:20:34',
                'icon' => 'icon/yvwnTYNtcckJQWaNIn4jDbFdQyWXBTcPRVwId0u9.png',
                'id' => 6,
                'name' => 'Home Security',
                'slug' => 'home-security',
                'updated_at' => '2022-12-03 22:04:37',
            ),
            6 => 
            array (
                'created_at' => '2022-12-03 14:21:00',
                'icon' => 'icon/GJoiSnWPfWpA91qE4H31znJOaK763DbClFOGVzKk.png',
                'id' => 7,
                'name' => 'Refrigerator Services',
                'slug' => 'refrigerator-services',
                'updated_at' => '2022-12-03 22:04:46',
            ),
            7 => 
            array (
                'created_at' => '2022-12-03 14:21:11',
                'icon' => 'icon/viBW0dnNbpfthLh88HJ7dAl21yPwr1H5fEgpRJ9A.png',
                'id' => 8,
                'name' => 'RO-Repair Services',
                'slug' => 'ro-repair-services',
                'updated_at' => '2022-12-03 22:04:54',
            ),
        ));
        
        
    }
}