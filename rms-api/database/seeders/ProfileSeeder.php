<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'fullname'=>'Anwar Prasetya',
            'slug'=>Str::slug(Str::random(20)),
            'age'=>'20',
            'address'=>'Sidoarjo, Jawa Timur',
            'description'=>fake()->sentence(10, true),
            'last_education'=>'S1',
            // 'user_id'=>fake()->randomElement(User::where('role', 'job seeker')->pluck('id')->toArray()),
            'document_url'=>'http://localhost:8000/files/applications/default.pdf',
            'image'=>'http://localhost:8000/files/profiles/default.png',
            // 'status'=>'unemployed',
            'user_id'=>3,
            // 'dream_job'=>fake()->randomElement(Category::where('status', 'active')->pluck('id')->toArray()),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('profiles')->insert([
            'fullname'=>'Raymond Arnold',
            'slug'=>Str::slug(Str::random(20)),
            'age'=>'20',
            'address'=>'Sidoarjo, Jawa Timur',
            'description'=>fake()->sentence(10, true),
            'last_education'=>'S1',
            // 'user_id'=>fake()->randomElement(User::where('role', 'job seeker')->pluck('id')->toArray()),
            'document_url'=>'http://localhost:8000/files/applications/default.pdf',
            'image'=>'http://localhost:8000/files/profiles/default.png',
            // 'status'=>'unemployed',
            'user_id'=>6,
            // 'dream_job'=>fake()->randomElement(Category::where('status', 'active')->pluck('id')->toArray()),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        \App\Models\Profile::factory(2)->create();
    }
}
