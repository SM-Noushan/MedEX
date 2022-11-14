<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Userdetail::factory()->create([
            'name'=> 'Abu Sakib',
            'phone' =>'013xxxxxxx0',
            'dob'=> '1999-12-18',
            'bloodgroup'=> 'AB-',
            'sex'=> 'Other',
            'religion' =>'Islam',
            'birthcertificate'=> 'Pending',
            'address' =>'Kamlapur Slum',
            'image' =>'sakib_profile.img',
            'user_id'=> 2,
        ]);
    }
}
