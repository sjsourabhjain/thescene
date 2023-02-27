<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            
            ['category_name' => 'Weekly Meet Up','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Night Club','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Amphitheater','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Arena','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Festival','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Outdoor','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Comedy','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Play','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Conference','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Live Music','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Talent Show','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Movie','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Roasting','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Theme Dinner','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Dueling Piano','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Casino Party','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],
            ['category_name' => 'Fair/Circus ','parent_id'=>0, 'status'=>1, 'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")],

        ]);
    }
}
