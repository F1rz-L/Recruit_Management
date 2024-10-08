<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MainJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('main_jobs')->insert([
        //     'title'=>'Software Engineer',
        //     'slug'=>Str::lower(str_replace('', '_', Str::random(15))),
        //     'salary'=>36000,
        //     'expire_at'=>fake()->dateTimeBetween('+1 month', '+2 month'),
        //     'cat_id'=>'1',
        //     'company_id'=>1,
        //     'icon'=>'http://localhost:8000/files/jobs/default.png',
        //     'description'=>'Test Description',
        //     'status'=>'active',
        //     'type'=>'full time',
        //     'is_featured'=>true,
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);
        // DB::table('main_jobs')->insert([
        //     'title'=>'Graphic Designer',
        //     'slug'=>Str::lower(str_replace('', '_', Str::random(15))),
        //     'salary'=>41000,
        //     'expire_at'=>fake()->dateTimeBetween('+1 month', '+2 month'),
        //     'cat_id'=>'2',
        //     'company_id'=>1,
        //     'icon'=>'http://localhost:8000/files/jobs/default2.png',
        //     'description'=>'Test Description',
        //     'status'=>'active',
        //     'type'=>'part time',
        //     'is_featured'=>true,
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);
        // DB::table('main_jobs')->insert([
        //     'title'=>'Software Development',
        //     'slug'=>Str::lower(str_replace('', '_', Str::random(15))),
        //     'salary'=>41000,
        //     'expire_at'=>fake()->dateTimeBetween('+1 month', '+2 month'),
        //     'cat_id'=>'1',
        //     'company_id'=>1,
        //     'icon'=>'http://localhost:8000/files/jobs/default1.png',
        //     'description'=>'Test Description',
        //     'status'=>'active',
        //     'type'=>'full time',
        //     'is_featured'=>true,
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);

        \App\Models\MainJob::factory(50)->create();
    }
}
